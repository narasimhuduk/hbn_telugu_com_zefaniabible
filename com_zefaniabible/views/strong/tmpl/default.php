<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <  Generated with Cook           (100% Vitamin) |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.6
* @package		ZefaniaBible
* @subpackage	Zefaniabible
* @copyright	Missionary Church of Grace
* @author		Andrei Chernyshev - www.missionarychurchofgrace.org - andrei.chernyshev1@gmail.com
* @license		GNU/GPL
*
* /!\  Joomla! is free software.
* This version may have been modified pursuant to the GNU General Public License,
* and as distributed it includes or is derivative of works licensed under the
* GNU General Public License or other free or open source software licenses.
*
*             .oooO  Oooo.     See COPYRIGHT.php for copyright notices and details.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

defined('_JEXEC') or die('Restricted access');

  
	//if($this->item->flg_enable_debug == 1)
//	{
		echo '<!--';
		print_r($this->item);
		echo '-->';
//	}


 $number = JRequest::getVar("item");
 
     ?>
     <div class="tsk_main_container" style="display:none;">
    <div class="tsk_main_heading"><h1>హీబ్రూ మరియు గ్రీక్ స్ట్రాంగ్ యొక్క సమన్వయం</h1></div>
    <div class="tsk_sub_heading"><h2 style="margin-bottom:0px;">హీబ్రూ పదాలు - H1 నుండి H8674 వరకు     </h2></div>
    <div class="tsk_sub_heading"><h2>గ్రీక్ పదాలు - G1 నుండి G5624 వరకు</h2></div>
<div class="row bibleref-nav">
    <div class="form-inline">
        
        <input type="text" list="all_numbers" name="item" id="item" style="width:100px; text-transform:uppercase;" value="<?php echo $number; ?>">
<datalist id="all_numbers" >
   <?php for($i=1;$i<=8674;$i++) {   
   echo "<option>H$i";
  } ?>
  <?php for($i=1;$i<=5624;$i++) {   
   echo "<option>G$i";
  } ?>
   
</datalist>

         
        
         
        <button id="SearchButton" class="btn btn-primary btnnavsearch" type="button" title="Search" onclick="javascript: GetStrong();">
            <i class="glyphicon glyphicon-search fa"></i>
        </button>
         
    </div>
</div>
</div>



 

<script>
 jQuery(document).ready(function() {
     jQuery('.tsk_main_container').show();
     
     jQuery('#item').keyup(function() {
        this.value = this.value.toUpperCase();
    });
 });

function GetStrong() {
    var item = jQuery("#item").val();
    
    var URL = site_url+'bible/hebrew-and-greek/strong/'+item+'.html';
    window.location.href =  URL;
}
 
</script>

<style>
.disctionary_main h3{background:var(--color-primary);}
.tsk_main_container {text-align:center;}
.tsk_form_container {display:flex;max-width: 350px;align-items:center;text-align: center;justify-content: center;margin-left: auto;margin-right: auto;width: 100%;}
.tsk_main_heading h1{margin-top: 0;
    font-size: 36px;}
.tsk_sub_heading h2{margin-bottom: 50px;
    font-size: 30px;}    

.glyphicon-search:before {
    content: "\f002";
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
}

.input-group .form-control, .input-group-addon, .input-group-btn {
    display: table-cell;
}

.input-group-addon, .input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group-btn {
    position: relative;
    font-size: 0;
    white-space: nowrap;
}

.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
    margin-right: -1px;
}

.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn-group:not(:last-child)>.btn, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.input-group-btn>.btn {
    position: relative;
}

.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #eee;
    opacity: 1;
}
.form-control {
    font-size: 16px;
    color: #000;
}

.dropdown-menu {
    max-height: 460px;
    overflow-y: auto;
}

.dropdown-menu {
    font-size: 16px;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
    box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
}

.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}
.btn{font-size:16px;    padding: 4px 12px;    line-height: 1.5;}

.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
    padding-right: 0px;
    padding-left: 5px;
    margin-bottom: 0;
    padding-top: 4px;
}

.bibleref-nav {
    max-width: 150px;
    margin: 10px auto 10px auto;
}

.inputgrp1 {
    margin-top: 10px;
}
.inputgrp1, .inputgrp2, .inputgrp3 {
    max-width: none;
    margin-right: 8px;
    float: left;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.btnnav {
    width: 100px;
}
.btnnavsearch {
    width: 97%;
    margin-bottom: 10px;
}

 
    .bibleref-nav{max-width: 150px;    margin: 20px auto 27px auto;}
    .form-inline .input-group{    display: inline-table;    vertical-align: middle;}
    .inputgrp1{    max-width: 220px;
    margin-right: 8px;
    margin-top: 0;
    float: left;}
    .inputgrp2 {
    max-width: 135px;
    margin-right: 8px;
    float: left;
}
.inputgrp3 {
    max-width: 120px;
    margin-right: 8px;
    float: left;
}
.btnnavsearch {
    width: auto;
    float: left;
    margin-bottom: 0;
}

.form-inline .input-group .form-control, .form-inline .input-group .input-group-addon, .form-inline .input-group .input-group-btn{width: auto;}

.btnnav {
    width: auto;
}

.form-inline .input-group>.form-control{width: 100%;}

 

</style>
 
     
 <?php 
 
 if($number!='') {
	        $db =& JFactory::getDBO();
	        $query = 'SELECT id, description FROM #__zefaniabible_dictionary_detail C where item=\''.$number.'\' order by id asc';
		//exit;
		$db->setQuery ( $query  );
		$rows = $db->loadObjectList();
		
		$bible_books = [1  => "ఆదికాండము",  2 => "నిర్గమకాండము ",  3 => "లేవీయకాండము",  4 => "సంఖ్యాకాండము",  5 => "ద్వితీయోపదేశకాండమ",  6 => "యెహొషువ",  7 => "న్యాయాధిపతులు",  8 => "రూతు",  9 => "1 సమూయేలు",  10 => "2 సమూయేలు",  11 => "1 రాజులు",  12 => "2 రాజులు",  13 => "1దినవృత్తాంతములు",  14 => "2దినవృత్తాంతములు",  15 => "ఎజ్రా ",  16 => "నెహెమ్యా",  17 => "ఎస్తేరు",  18 => "యోబు గ్రంథము",  19 => "కీర్తనల గ్రంథము",  20 => "సామెతలు",  21 => "ప్రసంగి",  22 =>"పరమగీతములు",  23 => "యెషయా",  24 => "యిర్మీయా",  25 => "విలాపవాక్యములు ",  26 => "యెహెజ్కేలు",  27 => "దానియేలు",  28 => "హొషేయ",  29 => "యోవేలు",  30 => "ఆమోసు",  31 => "ఓబద్యా ",  32 => "యోనా",  33 => "మీకా",  34 => "నహూము",  35 => "హబక్కూకు",  36 => "జెఫన్యా",  37 => "హగ్గయి",  38 => "జెకర్యా",  39 => "మలాకీ ",  40 => "మత్తయి",  41 => "మార్కు",  42 => "లూకా",  43 => "యోహాను",  44 => "అపొస్తలుల కార్యములు",  45 => "రోమీయులకు",  46 => "1 1 కొరింథీయులకు",  47 => "2 1 కొరింథీయులకు",  48 => "గలతీయులకు",  49 => "ఎఫెసీయులకు",  50 => "ఫిలిప్పీయులకు",  51 => "కొలొస్సయులకు",  52 => "1 థెస్సలొనీకయులకు",  53 => "2  థెస్సలొనీకయులకు",  54 => "1 తిమోతికి",  55 => "2 తిమోతికి",  56 => "తీతుకు",  57 => "ఫిలేమోనుకు",  58 => "హెబ్రీయులకు",  59 => "యాకోబు",  60 => "1 పేతురు",  61 => "2 పేతురు",  62 => "1 యోహాను",  63 => "2 యోహాను",  64 => "3 యోహాను",  65 => "యూదా",  66 => "ప్రకటన"];
		$regex = '/mscope=["\']?([^"\'>]+)["\']?/';// <reflink mscope="4;25;14"></reflink> 
    	$find_all = [];
    	$replace_all = [];
    	echo "<style>p{margin:0;}</style>";
    	echo '<div class="disctionary_main" style="line-height:1.7;"><h3>'.$number.'</h3>';
    	if(count($rows))	{
    	    foreach($rows as $row) {
    	        $desc = $row->description;
    	        $find_desc = ["\"/>", '<title>', '</title>'];
    	        $replace_desc = ['"></reflink>', '<b class="v_title">', '</b>'];
    	        $desc = str_replace($find_desc,$replace_desc,$desc);
    	        preg_match_all($regex, $desc, $matches);
		        $count = count($matches[0]); 
		        if($count) {
		            
		            foreach($matches[0] as $ref) {
		                $str_find = ["mscope=", '"'];
		                $ref_new = str_replace($str_find,"",$ref);
		                
		                $ref_new_arry = explode(";",$ref_new);
		                $book_id = $ref_new_arry[0];
		                $chapter_id = $ref_new_arry[1];
		                $verse_id = $ref_new_arry[2];
		                
		                $find_all[] = '<reflink '.$ref.'></reflink>';
    	                $replace_all[] = $bible_books[$book_id]." ".$chapter_id.":".$verse_id;
    	
		                /*$query = "SELECT verse FROM #__zefaniabible_bible_text C where bible_id=1 and book_id=$book_id and chapter_id=$chapter_id and verse_id=$verse_id";
                		//exit;
                		$db->setQuery ( $query  );
                		$verse_rows = $db->loadObject();
                		print_r($verse_rows);*/
		
		               /* echo '<pre>';
		            print_r($ref_new_arry);
		            die;*/
		                
		            }
		            /*echo '<pre>';
		            print_r($matches[0]);
		            die;*/
		        }
		        
		        $desc = str_replace($find_all, $replace_all ,$desc);
		
    	        echo $desc.'<br>';
    	    }
    	} else {
    	    echo "Does not exist";
    	}
    		echo '</div>';
 }
	    	//echo "Word";
		//	exit;
			
?>