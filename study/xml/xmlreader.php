
<?php
function xmlParse($file,$wrapperName,$callback,$limit=NULL){
    $xml = new XMLReader();
    if(!$xml->open($file)){
        die("Failed to open input file.");
    }
    $n=0;
    $x=0;
    while($xml->read()){
        if($xml->nodeType==XMLReader::ELEMENT && $xml->name == $wrapperName){
            while($xml->read() && $xml->name != $wrapperName){
                if($xml->nodeType==XMLReader::ELEMENT){
                    $name = $xml->name;
                    $xml->read();
                    $value = $xml->value;
                    if(preg_match("/[^\s]/",$value)){
                        $subarray[$name] = $value;
                    }
                }
            }
            if($limit==NULL || $x<$limit){
                if($callback($subarray)){
                    $x++;
                }
                unset($subarray);
            }
            $n++;
        }
    }
    $xml->close();
}

//Sample Usage:
$somefile = "xml_for_xmlreader.xml";
xmlParse($somefile,'item_data','callback');

?>
<?php
function callback($array){
    //condition and action for positive validation (increments parser limit)
    if($array['info1']!="Out Of Stock"){
        /*add to database*/
        echo("out of stock");
        return TRUE;
    }
    else {
    	echo("in stock");
        return FALSE;
    }
}
?>