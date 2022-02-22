//FCKConfig.HtmlEncodeOutput = false ;
FCKConfig.ProcessHTMLEntities = false ;
FCKConfig.AutoDetectLanguage = false ;
FCKConfig.DefaultLanguage = "vi" ;
FCKConfig.SkinPath = '/fckeditor/editor/skins/office2003/' ;
FCKConfig.ToolbarSets["Default"] = [
['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
'/',
['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
['Link','Unlink','Anchor'],
['Image','Flash','Table','Rule','Smiley','SpecialChar','PageBreak'],
'/',
['Style','FontFormat','FontName','FontSize'],
['TextColor','BGColor'],
['FitWindow','ShowBlocks'] // No comma for the last row.
] ;

FCKConfig.ToolbarSets["Basic"] = [
['Bold','Italic','-','OrderedList','UnorderedList','-','Link','Unlink']
] ;
