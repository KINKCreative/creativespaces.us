<?php

class Quote extends DataObject {

	static $db = array(
		'QuoteText' => 'Text',
		'Name' => 'Varchar(255)',
		'Link' => 'Varchar(255)',
		'Stars' => 'Int'
	);

	static $defaults = array(
	);

	static $has_one = array (
		'Quotes' => 'Quotes'
	);

	function getCMSFields() {
		return new FieldList(
			new TextareaField('QuoteText'),
			new TextField('Name'),
			new TextField('Link'),
			new OptionSetField("Stars", "Stars", array(""=>"None", 1=>1,2=>2,3=>3,4=>4,5=>5))
		);
	}

	public function StarLoop($value='<i class="material-icons">star</i>') {
		if(!$this->Stars) {
			return false;
		}
		$result = new ArrayList(); //array_fill(0, (int)$this->Stars, $value);
		for($i=0; $i < (int)$this->Stars; $i++) {
			$result->push(new ArrayData(array("Value" => $value)));
		}
		return $result;
	}

}

?>
