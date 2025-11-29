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



// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Zefaniabible component
 *
 * @static
 * @package		Joomla
 * @subpackage	Zefaniabible
 *
 */
class ZefaniabibleViewReferences extends JViewLegacy
{
	/*
	 * Define here the default list limit
	 */
	protected $_default_limit = null;
	private $str_primary_dictionary;
	
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$config = JFactory::getConfig();
		$layout = $this->getLayout();
		switch($layout)
		{

			case 'default':
				$fct = "display_" . $layout;
				$comp = JRequest::getVar("tmpl");
				if($comp!='component')
				$fct = "display_" . $layout.'_new';
				$this->$fct($tpl);
				break;
		}
	}
	
	function display_default($tpl = null)
	{
		$app = JFactory::getApplication();
		$params = JComponentHelper::getParams( 'com_zefaniabible' );
		/*
			a = Bible Version
			b = book
			c = chapter
			d = verse
		*/	
		require_once(JPATH_COMPONENT_SITE.'/models/default.php');
		require_once(JPATH_COMPONENT_SITE.'/helpers/common.php');
		$mdl_default 	= new ZefaniabibleModelDefault;
		$mdl_common 	= new ZefaniabibleCommonHelper;		
		
		JHTML::stylesheet('components/com_zefaniabible/css/modal.css');
		JHTML::stylesheet('zefaniascripturelinks.css', 'plugins/content/zefaniascripturelinks/css/');
		
		$jinput = JFactory::getApplication()->input;
		$item = new stdClass();
		$item->str_primary_bible 				= $params->get('primaryBible', $mdl_default->_buildQuery_first_record());	
		$item->flg_show_commentary 				= $params->get('show_commentary', '0');
		$item->str_primary_commentary 			= $params->get('primaryCommentary');
		$item->flg_reference_words 				= $params->get('flg_reference_words', '1');
		$item->flg_reference_chapter_link 		= $params->get('flg_reference_chapter_link', '1');
		$item->str_primary_dictionary  			= $params->get('str_primary_dictionary','');
		$item->str_ref_default_image 			= $params->get('str_ref_default_image', 'media/com_zefaniabible/images/references.jpg');
		$item->flg_enable_debug					= $params->get('flg_enable_debug','0');
		
		$item->str_Bible_Version 	= $jinput->get('bible', $item->str_primary_bible, 'CMD');	
		$item->int_Bible_Book_ID 	= $jinput->get('book', '1', 'INT');	
		$item->int_Bible_Chapter 	= $jinput->get('chapter', '1', 'INT');		
		$item->int_Bible_Verse	 	= $jinput->get('verse', '1', 'INT');
		
		$item->arr_english_book_names 	= $mdl_common->fnc_load_languages();		
		$item->arr_references 			= $mdl_default->_buildQuery_Single_Reference($item->int_Bible_Book_ID, $item->int_Bible_Chapter, $item->int_Bible_Verse );
		$item->str_view_plan			= $mdl_default->_buildQuery_get_menu_id('standard');
		
			$str_match_fuction = "/(?=\S)([HG](\d{1,4}))/iu";
			$arr_orig_ref[1]='ge';
			$arr_orig_ref[2]='ex';
			$arr_orig_ref[3]='le';
			$arr_orig_ref[4]='nu';
			$arr_orig_ref[5]='de';
			$arr_orig_ref[6]='jos';
			$arr_orig_ref[7]='jud';
			$arr_orig_ref[8]='ru';
			$arr_orig_ref[9]='1sa';
			$arr_orig_ref[10]='2sa';
			$arr_orig_ref[11]='1ki';
			$arr_orig_ref[12]='2ki';
			$arr_orig_ref[13]='1ch';
			$arr_orig_ref[14]='2ch';
			$arr_orig_ref[15]='ezr';
			$arr_orig_ref[16]='ne';
			$arr_orig_ref[17]='es';
			$arr_orig_ref[18]='job';
			$arr_orig_ref[19]='ps';
			$arr_orig_ref[20]='pr';
			$arr_orig_ref[21]='ec';
			$arr_orig_ref[22]='so';
			$arr_orig_ref[23]='isa';
			$arr_orig_ref[24]='jer';
			$arr_orig_ref[25]='la';
			$arr_orig_ref[26]='eze';
			$arr_orig_ref[27]='da';
			$arr_orig_ref[28]='ho';
			$arr_orig_ref[29]='joe';
			$arr_orig_ref[30]='am';
			$arr_orig_ref[31]='ob';
			$arr_orig_ref[32]='jon';
			$arr_orig_ref[33]='mic';
			$arr_orig_ref[34]='na';
			$arr_orig_ref[35]='hab';
			$arr_orig_ref[36]='zep';
			$arr_orig_ref[37]='hag';
			$arr_orig_ref[38]='zec';
			$arr_orig_ref[39]='mal';
			$arr_orig_ref[40]='mt';
			$arr_orig_ref[41]='mr';
			$arr_orig_ref[42]='lu';
			$arr_orig_ref[43]='joh';
			$arr_orig_ref[44]='ac';
			$arr_orig_ref[45]='ro';
			$arr_orig_ref[46]='1co';
			$arr_orig_ref[47]='2co';
			$arr_orig_ref[48]='ga';
			$arr_orig_ref[49]='eph';
			$arr_orig_ref[50]='php';
			$arr_orig_ref[51]='col';
			$arr_orig_ref[52]='1th';
			$arr_orig_ref[53]='2th';
			$arr_orig_ref[54]='1ti';
			$arr_orig_ref[55]='2ti';
			$arr_orig_ref[56]='tit';
			$arr_orig_ref[57]='phm';
			$arr_orig_ref[58]='heb';
			$arr_orig_ref[59]='jas';
			$arr_orig_ref[60]='1pe';
			$arr_orig_ref[61]='2pe';
			$arr_orig_ref[62]='1jo';
			$arr_orig_ref[63]='2jo';
			$arr_orig_ref[64]='3jo';
			$arr_orig_ref[65]='jude';
			$arr_orig_ref[66]='re';
			
			
			$bile_names_select = '<select name="bible_name">';
		    for($x = 1; $x <= 66; $x++) {
			    $bile_names_select.= '<option value="'.$x.'">'.JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_'.$x).'</option>';
			}
			$bile_names_select.= '</select>';
			echo '<div class="custom_ref_search" style="display:none;">'.$bile_names_select.'</div>';
			echo '<div class="zef_reference_image"><img src="'.$item->str_ref_default_image.'"></div>';
			foreach($item->arr_references as $obj_References)
			{ 
				$arr_single_ref = preg_split('/;/',$obj_References->reference);
				if($item->flg_reference_words)
				{
					echo '<div class="zef_reference_word">'.$obj_References->word.'</div>';
				}
				foreach($arr_single_ref as $obj_single_ref)
				{
					$item->int_Bible_Book_ID = 1;
					for($x = 1; $x <= 66; $x++)
					{
						if(preg_match('/\b('.$arr_orig_ref[$x].')\b/',$obj_single_ref))
						{
							$item->int_Bible_Book_ID = $x;
							break;
						}
					}				
					$str_bible_book_abr = JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_ABR_'.$item->int_Bible_Book_ID);
					$str_bible_single_ref = preg_replace( "/\b(".$arr_orig_ref[$item->int_Bible_Book_ID].")\b/", $str_bible_book_abr, $obj_single_ref );
					$arr_bible_chapter = preg_split('/:/', preg_replace( "#".$str_bible_book_abr."(\s)?#", '', $str_bible_single_ref ));
					$item->int_Bible_Chapter = $arr_bible_chapter[0];
					$arr_bible_verses = preg_split('/,/',$arr_bible_chapter[1]);
	
					$str_end_chap = 0;
					$str_end_verse = 0;
					$str_verse = '';
					echo '<div class="zef_reference_modal">';
					foreach($arr_bible_verses as $obj_bible_verses)
					{			
						if(preg_match('/-/',$obj_bible_verses))
						{
							$arr_verses_split = preg_split('/-/',$obj_bible_verses);
							$str_start_verse = $arr_verses_split[0];
							$str_end_verse = $arr_verses_split[1];
						}
						else
						{
							$str_start_verse = $obj_bible_verses;	
						}				
						$str_bible_verse_full = JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_'.$item->int_Bible_Book_ID)." ".$item->int_Bible_Chapter.":".$str_start_verse;
						if($str_end_verse != 0)
						{
							$str_bible_verse_full .= '-'.$str_end_verse;
						}											
						$arr_verse = $mdl_default->fnc_make_verse($item->str_Bible_Version,$item->int_Bible_Book_ID,$item->int_Bible_Chapter,$str_start_verse,$str_end_verse);
						echo '<div class="zef_content_title">'.$str_bible_verse_full."</div>";
						$x = 1;
						echo '<div class="zef_reference">';
						foreach ($arr_verse as $obj_verse)
						{
						   
							if ($x % 2 )
							{
								echo '<div class="odd">';
							}
							else
							{
								echo '<div class="even">';
							}
							if($str_end_verse != 0)
							{
								echo '<div class="zef_content_verse_id" >'.$obj_verse->verse_id.'</div>';
							}
	
							$obj_verse->verse = preg_replace_callback( $str_match_fuction, array( &$this, 'fnc_Make_Scripture'),  $obj_verse->verse);
							
							 
							
							$obj_verse->verse = preg_replace('/<span[^>]*>([\s\S]*?)<\/span[^>]*>/', '', $obj_verse->verse);
						
							echo '<div class="zef_content_verse">'.$obj_verse->verse."</div>";
							echo '<div style="clear:both"></div>';
							echo '</div>';
							$x++;
						}		
							
						$str_url = "index.php?option=com_zefaniabible&bible=".$item->str_Bible_Version."&view=standard&book=".
								$item->int_Bible_Book_ID."-".strtolower(str_replace(" ","-",$item->arr_english_book_names[$item->int_Bible_Book_ID]))."&chapter=".($item->int_Bible_Chapter)."-chapter&Itemid=".$item->str_view_plan;	
						if($item->flg_show_commentary)
						{
							$str_url .=  "&com=".$item->str_primary_commentary;
						}
						if($item->flg_reference_chapter_link)
						{
							echo "<div class='zef_content_verse_link'><a title='".JText::_('ZEFANIABIBLE_BIBLE_REFERENCE_GOTO_CHAPTER')." ".JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_'.$item->int_Bible_Book_ID)." ".$item->int_Bible_Chapter."' id='zef_links' href='".JRoute::_($str_url)."' target='_parent'>".JText::_("ZEFANIABIBLE_BIBLE_REFERENCE_GOTO_CHAPTER")."</a></div>";
						}
						echo '<div style="clear:both"></div>';					
					echo '</div>';					
					}
					echo '</div>';
				}
			}
		
		//Filters
		$this->assignRef('item',	$item);
		parent::display($tpl);
	}
	
	function display_default_new($tpl = null)
	{
		$app = JFactory::getApplication();
		$params = JComponentHelper::getParams( 'com_zefaniabible' );
		/*
			a = Bible Version
			b = book
			c = chapter
			d = verse
		*/	
		require_once(JPATH_COMPONENT_SITE.'/models/default.php');
		require_once(JPATH_COMPONENT_SITE.'/helpers/common.php');
		$mdl_default 	= new ZefaniabibleModelDefault;
		$mdl_common 	= new ZefaniabibleCommonHelper;		
		
		JHTML::stylesheet('components/com_zefaniabible/css/modal.css');
		JHTML::stylesheet('zefaniascripturelinks.css', 'plugins/content/zefaniascripturelinks/css/');
		
		$jinput = JFactory::getApplication()->input;
		$item = new stdClass();
		$item->str_primary_bible 				= $params->get('primaryBible', $mdl_default->_buildQuery_first_record());	
		$item->flg_show_commentary 				= $params->get('show_commentary', '0');
		$item->str_primary_commentary 			= $params->get('primaryCommentary');
		$item->flg_reference_words 				= $params->get('flg_reference_words', '1');
		$item->flg_reference_chapter_link 		= $params->get('flg_reference_chapter_link', '1');
		$item->str_primary_dictionary  			= $params->get('str_primary_dictionary','');
		$item->str_ref_default_image 			= $params->get('str_ref_default_image', 'media/com_zefaniabible/images/references.jpg');
		$item->flg_enable_debug					= $params->get('flg_enable_debug','0');
		
		$item->str_Bible_Version 	= $jinput->get('bible', $item->str_primary_bible, 'CMD');	
		$item->int_Bible_Book_ID 	= $jinput->get('book', '1', 'INT');	
		$item->int_Bible_Chapter 	= $jinput->get('chapter', '1', 'INT');		
		$item->int_Bible_Verse	 	= $jinput->get('verse', '1', 'INT');
		
		$item->arr_english_book_names 	= $mdl_common->fnc_load_languages();		
		$item->arr_references 			= $mdl_default->_buildQuery_Single_Reference($item->int_Bible_Book_ID, $item->int_Bible_Chapter, $item->int_Bible_Verse );
		$item->str_view_plan			= $mdl_default->_buildQuery_get_menu_id('standard');
		
			$str_match_fuction = "/(?=\S)([HG](\d{1,4}))/iu";
			$arr_orig_ref[1]='ge';
			$arr_orig_ref[2]='ex';
			$arr_orig_ref[3]='le';
			$arr_orig_ref[4]='nu';
			$arr_orig_ref[5]='de';
			$arr_orig_ref[6]='jos';
			$arr_orig_ref[7]='jud';
			$arr_orig_ref[8]='ru';
			$arr_orig_ref[9]='1sa';
			$arr_orig_ref[10]='2sa';
			$arr_orig_ref[11]='1ki';
			$arr_orig_ref[12]='2ki';
			$arr_orig_ref[13]='1ch';
			$arr_orig_ref[14]='2ch';
			$arr_orig_ref[15]='ezr';
			$arr_orig_ref[16]='ne';
			$arr_orig_ref[17]='es';
			$arr_orig_ref[18]='job';
			$arr_orig_ref[19]='ps';
			$arr_orig_ref[20]='pr';
			$arr_orig_ref[21]='ec';
			$arr_orig_ref[22]='so';
			$arr_orig_ref[23]='isa';
			$arr_orig_ref[24]='jer';
			$arr_orig_ref[25]='la';
			$arr_orig_ref[26]='eze';
			$arr_orig_ref[27]='da';
			$arr_orig_ref[28]='ho';
			$arr_orig_ref[29]='joe';
			$arr_orig_ref[30]='am';
			$arr_orig_ref[31]='ob';
			$arr_orig_ref[32]='jon';
			$arr_orig_ref[33]='mic';
			$arr_orig_ref[34]='na';
			$arr_orig_ref[35]='hab';
			$arr_orig_ref[36]='zep';
			$arr_orig_ref[37]='hag';
			$arr_orig_ref[38]='zec';
			$arr_orig_ref[39]='mal';
			$arr_orig_ref[40]='mt';
			$arr_orig_ref[41]='mr';
			$arr_orig_ref[42]='lu';
			$arr_orig_ref[43]='joh';
			$arr_orig_ref[44]='ac';
			$arr_orig_ref[45]='ro';
			$arr_orig_ref[46]='1co';
			$arr_orig_ref[47]='2co';
			$arr_orig_ref[48]='ga';
			$arr_orig_ref[49]='eph';
			$arr_orig_ref[50]='php';
			$arr_orig_ref[51]='col';
			$arr_orig_ref[52]='1th';
			$arr_orig_ref[53]='2th';
			$arr_orig_ref[54]='1ti';
			$arr_orig_ref[55]='2ti';
			$arr_orig_ref[56]='tit';
			$arr_orig_ref[57]='phm';
			$arr_orig_ref[58]='heb';
			$arr_orig_ref[59]='jas';
			$arr_orig_ref[60]='1pe';
			$arr_orig_ref[61]='2pe';
			$arr_orig_ref[62]='1jo';
			$arr_orig_ref[63]='2jo';
			$arr_orig_ref[64]='3jo';
			$arr_orig_ref[65]='jude';
			$arr_orig_ref[66]='re';
			
			
			$bile_names_select = '<select name="bible_name">';
		    for($x = 1; $x <= 66; $x++) {
			    $bile_names_select.= '<option value="'.$x.'">'.JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_'.$x).'</option>';
			}
			$bile_names_select.= '</select>';
			echo '<div class="custom_ref_search" style="display:none;">'.$bile_names_select.'</div>';
			//echo '<div class="zef_reference_image"><img src="'.$item->str_ref_default_image.'"></div>';
			
			echo '<div class="tsk_main_container">    <div class="tsk_main_heading"><h1>ది ట్రెజరీ ఆఫ్ స్క్రిప్చర్ నాలెడ్జ్</h1></div>    <div class="tsk_sub_heading"><h2>500,000 కంటే ఎక్కువ బైబిల్ క్రాస్-రిఫరెన్సులు</h2></div><div class="row bibleref-nav">    <div class="form-inline">        <div class="input-group inputgrp1">            <div id="dropdownbook" class="input-group-btn">    <button class="btn btn-danger dropdown-toggle btnnav" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">        గ్రంథము <span class="caret"></span>    </button>    <ul class="dropdown-menu" id="ddlBibleBooks">        <li><a href="#" onclick="return false" data-value="1">ఆదికాండము</a></li><li><a href="#" onclick="return false" data-value="2">నిర్గమకాండము </a></li><li><a href="#" onclick="return false" data-value="3">లేవీయకాండము</a></li><li><a href="#" onclick="return false" data-value="4">సంఖ్యాకాండము</a></li><li><a href="#" onclick="return false" data-value="5">ద్వితీయోపదేశకాండమ</a></li><li><a href="#" onclick="return false" data-value="6">యెహొషువ</a></li><li><a href="#" onclick="return false" data-value="7">న్యాయాధిపతులు</a></li><li><a href="#" onclick="return false" data-value="8">రూతు</a></li><li><a href="#" onclick="return false" data-value="9">1 సమూయేలు</a></li><li><a href="#" onclick="return false" data-value="10">2 సమూయేలు</a></li><li><a href="#" onclick="return false" data-value="11">1 రాజులు</a></li><li><a href="#" onclick="return false" data-value="12">2 రాజులు</a></li><li><a href="#" onclick="return false" data-value="13">1దినవృత్తాంతములు</a></li><li><a href="#" onclick="return false" data-value="14">2 దినవృత్తాంతములు</a></li><li><a href="#" onclick="return false" data-value="15">ఎజ్రా </a></li><li><a href="#" onclick="return false" data-value="16">నెహెమ్యా</a></li><li><a href="#" onclick="return false" data-value="17">ఎస్తేరు</a></li><li><a href="#" onclick="return false" data-value="18">యోబు గ్రంథము</a></li><li><a href="#" onclick="return false" data-value="19">కీర్తనల గ్రంథము</a></li><li><a href="#" onclick="return false" data-value="20">సామెతలు</a></li><li><a href="#" onclick="return false" data-value="21">ప్రసంగి</a></li><li><a href="#" onclick="return false" data-value="22">పరమగీతములు</a></li><li><a href="#" onclick="return false" data-value="23">యెషయా</a></li><li><a href="#" onclick="return false" data-value="24">యిర్మీయా</a></li><li><a href="#" onclick="return false" data-value="25">విలాపవాక్యములు </a></li><li><a href="#" onclick="return false" data-value="26">యెహెజ్కేలు</a></li><li><a href="#" onclick="return false" data-value="27">దానియేలు</a></li><li><a href="#" onclick="return false" data-value="28">హొషేయ</a></li><li><a href="#" onclick="return false" data-value="29">యోవేలు</a></li><li><a href="#" onclick="return false" data-value="30">ఆమోసు</a></li><li><a href="#" onclick="return false" data-value="31">ఓబద్యా </a></li><li><a href="#" onclick="return false" data-value="32">యోనా</a></li><li><a href="#" onclick="return false" data-value="33">మీకా</a></li><li><a href="#" onclick="return false" data-value="34">నహూము</a></li><li><a href="#" onclick="return false" data-value="35">హబక్కూకు</a></li><li><a href="#" onclick="return false" data-value="36">జెఫన్యా</a></li><li><a href="#" onclick="return false" data-value="37">హగ్గయి</a></li><li><a href="#" onclick="return false" data-value="38">జెకర్యా</a></li><li><a href="#" onclick="return false" data-value="39">మలాకీ </a></li><li><a href="#" onclick="return false" data-value="40">మత్తయి</a></li><li><a href="#" onclick="return false" data-value="41">మార్కు</a></li><li><a href="#" onclick="return false" data-value="42">లూకా</a></li><li><a href="#" onclick="return false" data-value="43">యోహాను</a></li><li><a href="#" onclick="return false" data-value="44">అపొస్తలుల కార్యములు</a></li><li><a href="#" onclick="return false" data-value="45">రోమీయులకు</a></li><li><a href="#" onclick="return false" data-value="46">1 కొరింథీయులకు</a></li><li><a href="#" onclick="return false" data-value="47">2 కొరింథీయులకు</a></li><li><a href="#" onclick="return false" data-value="48">గలతీయులకు</a></li><li><a href="#" onclick="return false" data-value="49">ఎఫెసీయులకు</a></li><li><a href="#" onclick="return false" data-value="50">ఫిలిప్పీయులకు</a></li><li><a href="#" onclick="return false" data-value="51">కొలొస్సయులకు</a></li><li><a href="#" onclick="return false" data-value="52">1 థెస్సలొనీకయులకు</a></li><li><a href="#" onclick="return false" data-value="53">2  థెస్సలొనీకయులకు</a></li><li><a href="#" onclick="return false" data-value="54">1 తిమోతికి</a></li><li><a href="#" onclick="return false" data-value="55">2 తిమోతికి</a></li><li><a href="#" onclick="return false" data-value="56">తీతుకు</a></li><li><a href="#" onclick="return false" data-value="57">ఫిలేమోనుకు</a></li><li><a href="#" onclick="return false" data-value="58">హెబ్రీయులకు</a></li><li><a href="#" onclick="return false" data-value="59">యాకోబు</a></li><li><a href="#" onclick="return false" data-value="60">1 పేతురు</a></li><li><a href="#" onclick="return false" data-value="61">2 పేతురు</a></li><li><a href="#" onclick="return false" data-value="62">1 యోహాను</a></li><li><a href="#" onclick="return false" data-value="63">2 యోహాను</a></li><li><a href="#" onclick="return false" data-value="64">3 యోహాను</a></li><li><a href="#" onclick="return false" data-value="65">యూదా</a></li><li><a href="#" onclick="return false" data-value="66">ప్రకటన</a></li>    </ul></div>            <input id="inputbook" type="text" class="form-control inputnav" maxlength="20" readonly="readonly" aria-label="Text input with dropdown button">        </div>        <div class="input-group inputgrp2">            <div id="dropdownchapter" class="input-group-btn">                <button class="btn btn-danger dropdown-toggle btnnav" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    అధ్యాయము <span class="caret"></span>                </button>                <ul class="dropdown-menu" id="ddlBibleChapters"><li><a href="#" onclick="return false">1</a></li><li><a href="#" onclick="return false">2</a></li><li><a href="#" onclick="return false">3</a></li><li><a href="#" onclick="return false">4</a></li><li><a href="#" onclick="return false">5</a></li><li><a href="#" onclick="return false">6</a></li><li><a href="#" onclick="return false">7</a></li><li><a href="#" onclick="return false">8</a></li><li><a href="#" onclick="return false">9</a></li><li><a href="#" onclick="return false">10</a></li><li><a href="#" onclick="return false">11</a></li><li><a href="#" onclick="return false">12</a></li><li><a href="#" onclick="return false">13</a></li><li><a href="#" onclick="return false">14</a></li><li><a href="#" onclick="return false">15</a></li><li><a href="#" onclick="return false">16</a></li><li><a href="#" onclick="return false">17</a></li><li><a href="#" onclick="return false">18</a></li><li><a href="#" onclick="return false">19</a></li><li><a href="#" onclick="return false">20</a></li><li><a href="#" onclick="return false">21</a></li><li><a href="#" onclick="return false">22</a></li><li><a href="#" onclick="return false">23</a></li><li><a href="#" onclick="return false">24</a></li><li><a href="#" onclick="return false">25</a></li><li><a href="#" onclick="return false">26</a></li><li><a href="#" onclick="return false">27</a></li><li><a href="#" onclick="return false">28</a></li><li><a href="#" onclick="return false">29</a></li><li><a href="#" onclick="return false">30</a></li><li><a href="#" onclick="return false">31</a></li><li><a href="#" onclick="return false">32</a></li><li><a href="#" onclick="return false">33</a></li><li><a href="#" onclick="return false">34</a></li><li><a href="#" onclick="return false">35</a></li><li><a href="#" onclick="return false">36</a></li><li><a href="#" onclick="return false">37</a></li><li><a href="#" onclick="return false">38</a></li><li><a href="#" onclick="return false">39</a></li><li><a href="#" onclick="return false">40</a></li><li><a href="#" onclick="return false">41</a></li><li><a href="#" onclick="return false">42</a></li><li><a href="#" onclick="return false">43</a></li><li><a href="#" onclick="return false">44</a></li><li><a href="#" onclick="return false">45</a></li><li><a href="#" onclick="return false">46</a></li><li><a href="#" onclick="return false">47</a></li><li><a href="#" onclick="return false">48</a></li><li><a href="#" onclick="return false">49</a></li><li><a href="#" onclick="return false">50</a></li></ul>            </div>            <input id="inputchapter" type="text" class="form-control inputnav" maxlength="3" readonly="readonly" aria-label="Text input with dropdown button">        </div>        <div class="input-group inputgrp3">            <div id="dropdownverse" class="input-group-btn">                <button class="btn btn-danger dropdown-toggle btnnav" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    వచనం <span class="caret"></span>                </button>                <ul class="dropdown-menu" id="ddlBibleVerses"><li><a href="#" onclick="return false">1</a></li><li><a href="#" onclick="return false">2</a></li><li><a href="#" onclick="return false">3</a></li><li><a href="#" onclick="return false">4</a></li><li><a href="#" onclick="return false">5</a></li><li><a href="#" onclick="return false">6</a></li><li><a href="#" onclick="return false">7</a></li><li><a href="#" onclick="return false">8</a></li><li><a href="#" onclick="return false">9</a></li><li><a href="#" onclick="return false">10</a></li><li><a href="#" onclick="return false">11</a></li><li><a href="#" onclick="return false">12</a></li><li><a href="#" onclick="return false">13</a></li><li><a href="#" onclick="return false">14</a></li><li><a href="#" onclick="return false">15</a></li><li><a href="#" onclick="return false">16</a></li><li><a href="#" onclick="return false">17</a></li><li><a href="#" onclick="return false">18</a></li><li><a href="#" onclick="return false">19</a></li><li><a href="#" onclick="return false">20</a></li><li><a href="#" onclick="return false">21</a></li><li><a href="#" onclick="return false">22</a></li><li><a href="#" onclick="return false">23</a></li><li><a href="#" onclick="return false">24</a></li><li><a href="#" onclick="return false">25</a></li><li><a href="#" onclick="return false">26</a></li><li><a href="#" onclick="return false">27</a></li><li><a href="#" onclick="return false">28</a></li><li><a href="#" onclick="return false">29</a></li><li><a href="#" onclick="return false">30</a></li><li><a href="#" onclick="return false">31</a></li></ul>ssssss            </div>            <input id="inputverse" type="text" class="form-control inputnav" maxlength="3" readonly="readonly" aria-label="Text input with dropdown button">        </div>        <button id="SearchButton" class="btn btn-primary btnnavsearch" type="button" title="Search" onclick="javascript: GetTsk();">            <i class="glyphicon glyphicon-search fa"></i>        </button>        <input type="hidden" name="book_number" id="book_number" value="1"/>    </div></div></div>';
			
			
			$arr_verse = $mdl_default->fnc_make_verse($item->str_Bible_Version,$item->int_Bible_Book_ID,$item->int_Bible_Chapter,$item->int_Bible_Verse,$item->int_Bible_Verse);					 
						 
						$all_verses = '';
						foreach ($arr_verse as $obj_verse)
						{
							$obj_verse->verse = preg_replace_callback( $str_match_fuction, array( &$this, 'fnc_Make_Scripture'),  $obj_verse->verse);
						
							$obj_verse->verse = preg_replace('/<span[^>]*>([\s\S]*?)<\/span[^>]*>/', '', $obj_verse->verse);
                            $all_verses.= strip_tags($obj_verse->verse);
						}
						foreach($item->arr_references as $obj_References)
                    	{ 
                    		if($item->flg_reference_words)
                    		{
                    			if(substr_count($all_verses, $obj_References->word))
                    			  $all_verses = str_replace($obj_References->word,"<span class='highlighted-word'>".$obj_References->word."</span>",$all_verses);
                    		}
                    	}
			echo '<div class="tsk_main_cnt"><a class="vlink" href="javascript:void(0)">'.JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_'.$item->int_Bible_Book_ID).' '.$item->int_Bible_Chapter.':'.$item->int_Bible_Verse.'</a><br>'.$all_verses.'</div>';
		$cust_book_id = 	$item->int_Bible_Book_ID;
		$cust_chapter_id = 	$item->int_Bible_Chapter;
		$cust_verse_id = 	$item->int_Bible_Verse;
				echo '<div class="row">
    <div id="LeftCol" class="col-md-6 leftCol">
        <div class="subhead">ది ట్రెజరీ ఆఫ్ స్క్రిప్చర్ నాలెడ్జ్</div>
        <div id="TskReferences">
            <div id="ViewAllButtonSmall" class="text-center visible-sm visible-xs"><button id="ViewAllSmall" class="btn btn-primary">అన్నిరిఫరెన్స్ ల కొరకు</button></div>';
            $references_count = 1;
            $references_text_head1 = '';
            $references_text_head2 = '';
			foreach($item->arr_references as $obj_References)
			{ 
				$arr_single_ref = preg_split('/;/',$obj_References->reference);
				if($item->flg_reference_words)
				{
					echo  '<div class="subhead2">'.$obj_References->word.'</div>';
				}
				foreach($arr_single_ref as $obj_single_ref)
				{
					$item->int_Bible_Book_ID = 1;
					for($x = 1; $x <= 66; $x++)
					{
						if(preg_match('/\b('.$arr_orig_ref[$x].')\b/',$obj_single_ref))
						{
							$item->int_Bible_Book_ID = $x;
							break;
						}
					}				
					$str_bible_book_abr = JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_ABR_'.$item->int_Bible_Book_ID);
					$str_bible_single_ref = preg_replace( "/\b(".$arr_orig_ref[$item->int_Bible_Book_ID].")\b/", $str_bible_book_abr, $obj_single_ref );
					$arr_bible_chapter = preg_split('/:/', preg_replace( "#".$str_bible_book_abr."(\s)?#", '', $str_bible_single_ref ));
					$item->int_Bible_Chapter = $arr_bible_chapter[0];
					$arr_bible_verses = preg_split('/,/',$arr_bible_chapter[1]);
	
					$str_end_chap = 0;
					$str_end_verse = 0;
					$str_verse = '';
					
					foreach($arr_bible_verses as $obj_bible_verses)
					{			
						if(preg_match('/-/',$obj_bible_verses))
						{
							$arr_verses_split = preg_split('/-/',$obj_bible_verses);
							$str_start_verse = $arr_verses_split[0];
							$str_end_verse = $arr_verses_split[1];
						}
						else
						{
							$str_start_verse = $obj_bible_verses;	
						}				
						$str_bible_verse_full = JText::_('ZEFANIABIBLE_BIBLE_BOOK_NAME_'.$item->int_Bible_Book_ID)." ".$item->int_Bible_Chapter.":".$str_start_verse;
						if($str_end_verse != 0)
						{
							$str_bible_verse_full .= '-'.$str_end_verse;
						}											
						$arr_verse = $mdl_default->fnc_make_verse($item->str_Bible_Version,$item->int_Bible_Book_ID,$item->int_Bible_Chapter,$str_start_verse,$str_end_verse);
					 
						$x = 1;
						$all_verses = '';
						foreach ($arr_verse as $obj_verse)
						{
							$obj_verse->verse = preg_replace_callback( $str_match_fuction, array( &$this, 'fnc_Make_Scripture'),  $obj_verse->verse);
						
							$obj_verse->verse = preg_replace('/<span[^>]*>([\s\S]*?)<\/span[^>]*>/', '', $obj_verse->verse);
                            $all_verses.= strip_tags($obj_verse->verse);
                            
							
							$x++;
						}
						
						$active_ref = '';
						if($references_count == 1) 
						$active_ref = 'tskrefhighlight';
						    
						echo '<div class="tskref"><a class="'.$active_ref.'" href="#" data-bibleid="20008022" data-verse=" '.$all_verses.'" data-word="'.$obj_References->word.'">'.$str_bible_verse_full.'</a></div>';
						if($references_count++ == 1) {
                            $references_text_head1 = $str_bible_verse_full;
                            $references_text_head2 = $all_verses;
						}
				}
			}
		}
		
		echo '        </div>
        <p>&nbsp;</p>
    </div>
    <div id="RightCol" class="col-md-6 rightCol hidden-sm hidden-xs">
        <div class="subhead">క్రాస్ రిఫరెన్స్ వీక్షణ</div>
        <div id="ViewAllButton" class="text-right"><button id="ViewAll" class="btn btn-primary">అన్నిరిఫరెన్స్ ల కొరకు</button></div>
        <div id="KjvReferences" style="display: block;">
            <div class="kjvref"><a href="#" data-id="20008022" class="vlink">'.$references_text_head1.'</a><br> '.$references_text_head2.'</div>
        </div>
        <p>&nbsp;</p>
    </div>
</div>';

		echo '<script>jQuery(document).ready(function(){    setDefaultTSKValues('.$cust_book_id.', '.$cust_chapter_id.', '.$cust_verse_id.'); });  </script><style>.tsk_main_container {text-align:center;}.tsk_form_container {display:flex;max-width: 350px;align-items:center;text-align: center;justify-content: center;margin-left: auto;margin-right: auto;width: 100%;}.tsk_main_heading h1{margin-top: 0;    font-size: 36px;}.tsk_sub_heading h2{margin-bottom: 30px;    font-size: 30px;}    .glyphicon-search:before {    content: "\f002";}.form-control {    display: block;    width: 100%;    height: 34px;    padding: 6px 12px;    font-size: 14px;    line-height: 1.42857143;    color: #555;    background-color: #fff;    background-image: none;    border: 1px solid #ccc;    border-radius: 4px;    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;    transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;}.input-group .form-control, .input-group-addon, .input-group-btn {    display: table-cell;}.input-group-addon, .input-group-btn {    width: 1%;    white-space: nowrap;    vertical-align: middle;}.input-group-btn {    position: relative;    font-size: 0;    white-space: nowrap;}.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {    margin-right: -1px;}.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn-group:not(:last-child)>.btn, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {    border-top-right-radius: 0;    border-bottom-right-radius: 0;}.input-group-btn>.btn {    position: relative;}.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {    background-color: #eee;    opacity: 1;}.form-control {    font-size: 16px;    color: #000;}.dropdown-menu {    max-height: 460px;    overflow-y: auto;}.dropdown-menu {    font-size: 16px;}.dropdown-menu {    position: absolute;    top: 100%;    left: 0;    z-index: 1000;    display: none;    float: left;    min-width: 160px;    padding: 5px 0;    margin: 2px 0 0;    font-size: 14px;    text-align: left;    list-style: none;    background-color: #fff;    background-clip: padding-box;    border: 1px solid #ccc;    border: 1px solid rgba(0,0,0,.15);    border-radius: 4px;    -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);    box-shadow: 0 6px 12px rgb(0 0 0 / 18%);}.dropdown-menu>li>a {    display: block;    padding: 3px 20px;    clear: both;    font-weight: 400;    line-height: 1.42857143;    color: #333;    white-space: nowrap;}.btn{font-size:16px;    padding: 4px 12px;    line-height: 1.5;}.input-group .form-control {    position: relative;    z-index: 2;    float: left;    width: 100%;    margin-bottom: 0;    padding-right: 0px;    padding-left: 5px;    margin-bottom: 0;    padding-top: 4px;}.bibleref-nav {    max-width: 270px;    margin: 10px auto 35px auto;}.inputgrp1 {    margin-top: 10px;}.inputgrp1, .inputgrp2, .inputgrp3 {    max-width: none;    margin-right: 8px;    float: left;}.input-group {    position: relative;    display: table;    border-collapse: separate;}.btnnav {    width: 100px;}.btnnavsearch {    width: 97%;    margin-bottom: 10px;}@media only screen and (min-width: 768px){    .bibleref-nav{max-width: 560px;    margin: 20px auto 27px auto;}    .form-inline .input-group{    display: inline-table;    vertical-align: middle;}    .inputgrp1{    max-width: 220px;    margin-right: 8px;    margin-top: 0;    float: left;}    .inputgrp2 {    max-width: 135px;    margin-right: 8px;    float: left;}.inputgrp3 {    max-width: 120px;    margin-right: 8px;    float: left;}.btnnavsearch {    width: auto;    float: left;    margin-bottom: 0;}.form-inline .input-group .form-control, .form-inline .input-group .input-group-addon, .form-inline .input-group .input-group-btn{width: auto;}.btnnav {    width: auto;}.form-inline .input-group>.form-control{width: 100%;}}.tsk_main_cnt{margin-bottom:30px;}</style>';
		//Filters
		$this->assignRef('item',	$item);
		parent::display($tpl);
	}
	private function fnc_Make_Scripture(&$arr_matches)
	{
		$temp = 'dict='.$this->str_primary_dictionary.'&number='.trim(strip_tags($arr_matches[0]));
		$str_verse = ' <a id="zef_strong_link" title="'. JText::_('COM_ZEFANIA_BIBLE_STRONG_LINK').'" href="index.php?view=strong&option=com_zefaniabible&tmpl=component&'.$temp.'" >';		
		$str_verse = $str_verse. trim(strip_tags($arr_matches[0]));			
		$str_verse = $str_verse. '</a> ';
		return $str_verse;
	}	
}