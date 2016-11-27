<?php
require_once "$parent_back/libs/JBBCode/Parser.php";

class YoutubeEmbed extends JBBCode\CodeDefinition {
	public function __construct() {
		parent::__construct();
		$this->setTagName("youtubeEmbed");
	}
	public function asHtml(JBBCode\ElementNode $el) {
		$content = "";
		foreach($el->getChildren() as $child)
			$content .= $child->getAsBBCode();
		$foundMatch = preg_match('/v=([A-z0-9=\-]+?)(&.*)?$/i', $content, $matches);
		if(!$foundMatch)
			return $el->getAsBBCode();
		else
			return "<iframe width=\"640\" height=\"390\" src=\"http://www.youtube.com/embed/".$matches[1]."\" frameborder=\"0\" allowfullscreen></iframe>";
	}
}

$parser = new JBBCode\Parser();
$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
$builder = new JBBCode\CodeDefinitionBuilder('h1', '<h1>{param}</h1>');
$parser->addCodeDefinition($builder->build());
$builder = new JBBCode\CodeDefinitionBuilder('h2', '<h2>{param}</h2>');
$parser->addCodeDefinition($builder->build());
$builder = new JBBCode\CodeDefinitionBuilder('h3', '<h3>{param}</h3>');
$parser->addCodeDefinition($builder->build());
$builder = new JBBCode\CodeDefinitionBuilder('h4', '<h4>{param}</h4>');
$parser->addCodeDefinition($builder->build());
$builder = new JBBCode\CodeDefinitionBuilder('h5', '<h5>{param}</h5>');
$parser->addCodeDefinition($builder->build());
$builder = new JBBCode\CodeDefinitionBuilder('h6', '<h6>{param}</h6>');
$parser->addCodeDefinition($builder->build());
$youtubeEmbed = new YoutubeEmbed();
$parser->addCodeDefinition($youtubeEmbed);