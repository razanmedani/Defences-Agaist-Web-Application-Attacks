<?php require_once("../includes/session.php");?>
<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php");?>
<?php require_once("../includes/validation.php");?>
<?php $layout_context="admin" ; ?>

<?php 
//session_regenerate_id(True);
//$admin=find_admin_with_id($_GET["admin"]);
?>
<?php
    $output1 = "Sorry, we don't recognize the value that you entered , XSS attack";
	$output2 = "Sorry, we don't recognize the value that you entered , SQL attack";
	  
//xss
foreach ($_REQUEST as $key => $value){//collect data after submiting an html form.
$re ="/((?i)([<＜]script[^>＞]*[>＞][\s\S]*?))|(?i)([\s\"\'`;\/0-9\=\x0B\x09\x0C\x3B\x2C\x28\x3B]+on[a-zA-Z]+[\s\x0B\x09\x0C\x3B\x2C\x28\x3B]*?=)|(?i)[\s\S](?:x(?:link:href|html|mlns)|!ENTITY.*?SYSTEM|data:text\/html|pattern(?=.*?=)|formaction|\@import|base64)\b|(?i)(?:<(?:(?:apple|objec)t|isindex|embed|style|form|meta)\b[^>]*?>[\s\S]*?|(?:=|U\s*?R\s*?L\s*?\()\s*?[^>]*?\s*?S\s*?C\s*?R\s*?I\s*?P\s*?T\s*?:)|(?i)<[^\w<>]*(?:[^<>\"'\s]*:)?[^\w<>]*(?:\W*?s\W*?c\W*?r\W*?i\W*?p\W*?t|\W*?f\W*?o\W*?r\W*?m|\W*?s\W*?t\W*?y\W*?l\W*?e|\W*?s\W*?v\W*?g|\W*?m\W*?a\W*?r\W*?q\W*?u\W*?e\W*?e|(?:\W*?l\W*?i\W*?n\W*?k|\W*?o\W*?b\W*?j\W*?e\W*?c\W*?t|\W*?e\W*?m\W*?b\W*?e\W*?d|\W*?a\W*?p\W*?p\W*?l\W*?e\W*?t|\W*?p\W*?a\W*?r\W*?a\W*?m|\W*?i?\W*?f\W*?r\W*?a\W*?m\W*?e|\W*?b\W*?a\W*?s\W*?e|\W*?b\W*?o\W*?d\W*?y|\W*?m\W*?e\W*?t\W*?a|\W*?i\W*?m\W*?a?\W*?g\W*?e?|\W*?v\W*?i\W*?d\W*?e\W*?o|\W*?a\W*?u\W*?d\W*?i\W*?o|\W*?b\W*?i\W*?n\W*?d\W*?i\W*?n\W*?g\W*?s|\W*?s\W*?e\W*?t|\W*?a\W*?n\W*?i\W*?m\W*?a\W*?t\W*?e)[^>\w])|(?:<\w[\s\S]*[\s\/]|['\"](?:[\s\S]*[\s\/])?)(?:formaction|style|background|src|lowsrc|ping|on(?:d(?:e(?:vice(?:(?:orienta|mo)tion|proximity|found|light)|livery(?:success|error)|activate)|r(?:ag(?:e(?:n(?:ter|d)|xit)|(?:gestur|leav)e|start|drop|over)?|op)|i(?:s(?:c(?:hargingtimechange|onnect(?:ing|ed))|abled)|aling)|ata(?:setc(?:omplete|hanged)|(?:availabl|chang)e|error)|urationchange|ownloading|blclick)|Moz(?:M(?:agnifyGesture(?:Update|Start)?|ouse(?:PixelScroll|Hittest))|S(?:wipeGesture(?:Update|Start|End)?|crolledAreaChanged)|(?:(?:Press)?TapGestur|BeforeResiz)e|EdgeUI(?:C(?:omplet|ancel)|Start)ed|RotateGesture(?:Update|Start)?|A(?:udioAvailable|fterPaint))|c(?:o(?:m(?:p(?:osition(?:update|start|end)|lete)|mand(?:update)?)|n(?:t(?:rolselect|extmenu)|nect(?:ing|ed))|py)|a(?:(?:llschang|ch)ed|nplay(?:through)?|rdstatechange)|h(?:(?:arging(?:time)?ch)?ange|ecking)|(?:fstate|ell)change|u(?:echange|t)|l(?:ick|ose))|m(?:o(?:z(?:pointerlock(?:change|error)|(?:orientation|time)change|fullscreen(?:change|error)|network(?:down|up)load)|use(?:(?:lea|mo)ve|o(?:ver|ut)|enter|wheel|down|up)|ve(?:start|end)?)|essage|ark)|s(?:t(?:a(?:t(?:uschanged|echange)|lled|rt)|k(?:sessione|comma)nd|op)|e(?:ek(?:complete|ing|ed)|(?:lec(?:tstar)?)?t|n(?:ding|t))|u(?:ccess|spend|bmit)|peech(?:start|end)|ound(?:start|end)|croll|how)|b(?:e(?:for(?:e(?:(?:scriptexecu|activa)te|u(?:nload|pdate)|p(?:aste|rint)|c(?:opy|ut)|editfocus)|deactivate)|gin(?:Event)?)|oun(?:dary|ce)|l(?:ocked|ur)|roadcast|usy)|a(?:n(?:imation(?:iteration|start|end)|tennastatechange)|fter(?:(?:scriptexecu|upda)te|print)|udio(?:process|start|end)|d(?:apteradded|dtrack)|ctivate|lerting|bort)|DOM(?:Node(?:Inserted(?:IntoDocument)?|Removed(?:FromDocument)?)|(?:CharacterData|Subtree)Modified|A(?:ttrModified|ctivate)|Focus(?:Out|In)|MouseScroll)|r(?:e(?:s(?:u(?:m(?:ing|e)|lt)|ize|et)|adystatechange|pea(?:tEven)?t|movetrack|trieving|ceived)|ow(?:s(?:inserted|delete)|e(?:nter|xit))|atechange)|p(?:op(?:up(?:hid(?:den|ing)|show(?:ing|n))|state)|a(?:ge(?:hide|show)|(?:st|us)e|int)|ro(?:pertychange|gress)|lay(?:ing)?)|t(?:ouch(?:(?:lea|mo)ve|en(?:ter|d)|cancel|start)|ime(?:update|out)|ransitionend|ext)|u(?:s(?:erproximity|sdreceived)|p(?:gradeneeded|dateready)|n(?:derflow|load))|f(?:o(?:rm(?:change|input)|cus(?:out|in)?)|i(?:lterchange|nish)|ailed)|l(?:o(?:ad(?:e(?:d(?:meta)?data|nd)|start)?|secapture)|evelchange|y)|g(?:amepad(?:(?:dis)?connected|button(?:down|up)|axismove)|et)|e(?:n(?:d(?:Event|ed)?|abled|ter)|rror(?:update)?|mptied|xit)|i(?:cc(?:cardlockerror|infochange)|n(?:coming|valid|put))|o(?:(?:(?:ff|n)lin|bsolet)e|verflow(?:changed)?|pen)|SVG(?:(?:Unl|L)oad|Resize|Scroll|Abort|Error|Zoom)|h(?:e(?:adphoneschange|l[dp])|ashchange|olding)|v(?:o(?:lum|ic)e|ersion)change|w(?:a(?:it|rn)ing|heel)|key(?:press|down|up)|(?:AppComman|Loa)d|no(?:update|match)|Request|zoom))[\s\x08]*?=|(?i)(?:\W|^)(?:javascript:(?:[\s\S]+[=\\\(\[\.<]|[\s\S]*?(?:\bname\b|\\[ux]\d))|data:(?:(?:[a-z]\w+\/\w[\w+-]+\w)?[;,]|[\s\S]*?;[\s\S]*?\b(?:base64|charset=)|[\s\S]*?,[\s\S]*?<[\s\S]*?\w[\s\S]*?>))|@\W*?i\W*?m\W*?p\W*?o\W*?r\W*?t\W*?(?:\/\*[\s\S]*?)?(?:[\"']|\W*?u\W*?r\W*?l[\s\S]*?\()|\W*?-\W*?m\W*?o\W*?z\W*?-\W*?b\W*?i\W*?n\W*?d\W*?i\W*?n\W*?g[\s\S]*?:[\s\S]*?\W*?u\W*?r\W*?l[\s\S]*?\(|(?i:<style.*?>.*?((@[i\\\\])|(([:=]|(&#x?0*((58)|(3A)|(61)|(3D));?)).*?([(\\\\]|(&#x?0*((40)|(28)|(92)|(5C));?)))))|(?i:<.*[:]?vmlframe.*?[\s]*?src[\s]*=)|(?i:(j|(&#x?0*((74)|(4A)|(106)|(6A));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(a|(&#x?0*((65)|(41)|(97)|(61));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(v|(&#x?0*((86)|(56)|(118)|(76));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(a|(&#x?0*((65)|(41)|(97)|(61));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(s|(&#x?0*((83)|(53)|(115)|(73));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(c|(&#x?0*((67)|(43)|(99)|(63));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(r|(&#x?0*((82)|(52)|(114)|(72));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(i|(&#x?0*((73)|(49)|(105)|(69));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(p|(&#x?0*((80)|(50)|(112)|(70));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(t|(&#x?0*((84)|(54)|(116)|(74));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(:|(&((#x?0*((58)|(3A));?)|(colon;)))).)|(?i:(v|(&#x?0*((86)|(56)|(118)|(76));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(b|(&#x?0*((66)|(42)|(98)|(62));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(s|(&#x?0*((83)|(53)|(115)|(73));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(c|(&#x?0*((67)|(43)|(99)|(63));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(r|(&#x?0*((82)|(52)|(114)|(72));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(i|(&#x?0*((73)|(49)|(105)|(69));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(p|(&#x?0*((80)|(50)|(112)|(70));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(t|(&#x?0*((84)|(54)|(116)|(74));?))([\t]|(&((#x?0*(9|(13)|(10)|A|D);?)|(tab;)|(newline;))))*(:|(&((#x?0*((58)|(3A));?)|(colon;)))).)|(?i:<EMBED[\s].*?((src)|(type)).*?=)|<[?]?import[\s\/+\S]*?implementation[\s\/+]*?=|(?i:<META[\s].*?http-equiv[\s]*=[\s]*[\"\'`]?(((c|(&#x?0*((67)|(43)|(99)|(63));?)))|((r|(&#x?0*((82)|(52)|(114)|(72));?)))|((s|(&#x?0*((83)|(53)|(115)|(73));?)))))|(?i:<META[\s].*?charset[\s]*=)|(?i:<LINK[\s].*?href[\s]*=)|(?i:<BASE[\s].*?href[\s]*=)|(?i:<APPLET[\s>])|(?i:<OBJECT[\s].*?((type)|(codetype)|(classid)|(code)|(data))[\s]*=)|(?:¾|¼).*(?:¾|¼|>)|(?:¾|¼|<).*(?:¾|¼)|(?:\+ADw\-|\+AD4\-).*(?:\+ADw\-|\+AD4\-|>)|(?:\+ADw\-|\+AD4\-|<).*(?:\+ADw\-|\+AD4\-)|(?i)\b(?:s(?:tyle|rc)|href)\b[\s\S]*?=|<(a|abbr|acronym|address|applet|area|audioscope|b|base|basefront|bdo|bgsound|big|blackface|blink|blockquote|body|bq|br|button|caption|center|cite|code|col|colgroup|comment|dd|del|dfn|dir|div|dl|dt|em|embed|fieldset|fn|font|form|frame|frameset|h1|head|hr|html|i|iframe|ilayer|img|input|ins|isindex|kdb|keygen|label|layer|legend|li|limittext|link|listing|map|marquee|menu|meta|multicol|nobr|noembed|noframes|noscript|nosmartquotes|object|ol|optgroup|option|p|param|plaintext|pre|q|rt|ruby|s|samp|script|select|server|shadow|sidebar|small|spacer|span|strike|strong|style|sub|sup|table|tbody|td|textarea|tfoot|th|thead|title|tr|tt|u|ul|var|wbr|xml|xmp)\W|(?i:[\"\'][ ]*(([^a-z0-9~_:\' ])|(in)).*?(((l|(\\\\u006C))(o|(\\\\u006F))(c|(\\\\u0063))(a|(\\\\u0061))(t|(\\\\u0074))(i|(\\\\u0069))(o|(\\\\u006F))(n|(\\\\u006E)))|((n|(\\\\u006E))(a|(\\\\u0061))(m|(\\\\u006D))(e|(\\\\u0065)))|((o|(\\\\u006F))(n|(\\\\u006E))(e|(\\\\u0065))(r|(\\\\u0072))(r|(\\\\u0072))(o|(\\\\u006F))(r|(\\\\u0072)))|((v|(\\\\u0076))(a|(\\\\u0061))(l|(\\\\u006C))(u|(\\\\u0075))(e|(\\\\u0065))(O|(\\\\u004F))(f|(\\\\u0066)))).*?=)|(?i:[\"\'][ ]*(([^a-z0-9~_:\' ])|(in)).+?[.].+?=)|&lt|&gt|(?i:SCRIPT)|(?i:alert)|(?i:get)|(?i:url)|(?i:eval)|(?i:^&#X)|(x3C)|(u003c)|(%3C)|(&#)/";
 preg_match_all($re, $value, $match_array, PREG_SET_ORDER, 0);

 if (empty($match_array)) {
	 $_SESSION['attack'] = 0;
 }else{
    $_SESSION['attack'] = 1;
	echo $output1;
	exit;
	
}

//sql inection regex 
$re="/(@detectSQLi)| W{4}|(sleep\((\s*?)(\d*?)(\s*?)\)|benchmark\((.*?)\,(.*?)\))|(?:m(?:s(?:ysaccessobjects|ysaces|ysobjects|ysqueries|ysrelationships|ysaccessstorage|ysaccessxml|ysmodules|ysmodules2|db)|(aster\.\.sysdatabases|ysql\.db)\b|s(?:ys(?:\.database_name|aux)\b|chema(?:\W*\(|_name\b)|qlite(_temp)?_master\b)|d(?:atabas|b_nam)e\W*\(|information_schema\b|pg_(catalog|toast)\b|northwind\b|tempdb\b)|(select|;)\s+(?:benchmark|if|sleep)\s*?\(\s*?\(?\s*?\w+)|(exec|execute).*?(?:\W)xp_cmdshell|(?:[\"'`]\s*?!\s*?[\"'`\w])|(?:from\W+information_schema\W)|(?:(?:(?:current_)?user|database|schema|connection_id)\s*?\([^\)]*?)|(?:[\"'`];?\s*?(?:select|union|having)\b\s*?[^\s])|(?:\wiif\s*?\()|(?:(?:exec|execute)\s+master\.)|(?:union select @)|(?:union[\w(\s]*?select)|(?:select.*?\w?user\()|(?:into[\s+]+(?:dump|out)file\s*?[\"'`])|(-0000023456|4294967295|4294967296|2147483648|2147483647|0000012345|-2147483648|-2147483649|0000023456|3.0.00738585072007e-308|1e309)$|([\s()]case\s*?\()|(?:\)\s*?like\s*?\()|(?:having\s*?[^\s]+\s*?[^\w\s])|(?:if\s?\([\d\w]\s*?[=<>~])|(?:alter\s*?\w+.*?(?:character|char)\s+set\s+\w+)|([\"'`];*?\s*?waitfor\s+(?:time|delay)\s+[\"'`])|(?:[\"'`];.*?:\s*?goto)|(?:merge.*?using\s*?\()|(execute\s*?immediate\s*?[\"'`])|(?:match\s*?[\w(),+-]+\s*?against\s*?\()|(union(.*?)select(.*?)from)|(?:select\s*?pg_sleep)|(?:waitfor\s*?delay\s?[\"'`]+\s?\d)|(?:;\s*?shutdown\s*?(?:;|--|#|\/\*|{))|(?:\[\$(?:ne|eq|lte?|gte?|n?in|mod|all|size|exists|type|slice|x?or|div|like|between|and)\])|(?:procedure\s+analyse\s*?\()|(?:;\s*?(declare|open)\s+[\w-]+)|(?:create\s+(procedure|function)\s*?\w+\s*?\(\s*?\)\s*?-)|(?:declare[^\w]+[@#]\s*?\w+)|(exec\s*?\(\s*?@)|(?:create\s+function\s+.+\s+returns)|(?:;\s*?(?:select|create|rename|truncate|load|alter|delete|update|insert|desc)\s*?[\[(]?\w{2,})|(?:[\d\W]\s+as\s*?[\"'`\w]+\s*?from)|(?:^[\W\d]+\s*?(?:union|select|create|rename|truncate|load|alter|delete|update|insert|desc)\b)|(?:(?:select|create|rename|truncate|load|alter|delete|update|insert|desc)\s+(?:(?:group_)concat|char|load_file)\s?\(?)|(?:end\s*?\);)|([\"'`]\s+regexp\W)|(?:[\s(]load_file\s*?\()|(^[\"'`;]+|[\"'`]+$)|(\!\=|\&\&|\|\||>>|<<|>=|<=|<>|<=>|\bxor\b|\brlike\b|\bregexp\b|\bisnull\b)|(?:not\s+between\s+0\s+and)|(?:is\s+null)|(like\s+null)|(?:(?:^|\W)in[+\s]*\([\s\d\"]+[^()]*\))|(?:\bxor\b|<>|rlike(?:\s+binary)?)|(?:regexp\s+binary)|([\s'\"`\(\)]*?)([\d\w]++)([\s'\"`\(\)]*?)(?:=|<=>|r?like|sounds\s+like|regexp)([\s'\"`\(\)]*?)\2|(!=|<=|>=|<>|<|>|\^|is\s+not|not\s+like|not\s+regex)|(?:,.*?[)\da-f\"'`][\"'`](?:[\"'`].*?[\"'`]|\Z|[^\"'`]+))|(?:\Wselect.+\W*?from)|((?:select|create|rename|truncate|load|alter|delete|update|insert|desc)\s*?\(\s*?space\s*?\()|(?:@.+=\s*?\(\s*?select)|(?:\d+\s*?(x?or|div|like|between|and)\s*?\d+\s*?[\-+])|(?:\/\w+;?\s+(?:having|and|x?or|div|like|between|and|select)\W)|(?:\d\s+group\s+by.+\()|(?:(?:;|#|--)\s*?(?:drop|alter))|(?:(?:;|#|--)\s*?(?:update|insert)\s*?\w{2,})|(?:[^\w]SET\s*?@\w+)|(?:(?:n?and|x?x?or|div|like|between|and|not|\|\||\&\&)[\s(]+\w+[\s)]*?[!=+]+[\s\d]*?[\"'`=()])|(?:union\s*?(?:all|distinct|[(!@]*?)?\s*?[([]*?\s*?select\s+)|(?:\w+\s+like\s+[\"'`])|(?:like\s*?[\"'`]\%)|(?:[\"'`]\s*?like\W*?[\"'`\d])|(?:[\"'`]\s*?(?:n?and|x?x?or|div|like|between|and|not|\|\||\&\&)\s+[\s\w]+=\s*?\w+\s*?having\s+)|(?:[\"'`]\s*?\*\s*?\w+\W+[\"'`])|(?:[\"'`]\s*?[^?\w\s=.,;)(]+\s*?[(@\"'`]*?\s*?\w+\W+\w)|(?:select\s+?[\[\]()\s\w\.,\"'`-]+from\s+)|(?:find_in_set\s*?\()|(?:\)\s*?when\s*?\d+\s*?then)|(?:[\"'`]\s*?(?:#|--|{))|(?:\/\*!\s?\d+)|(?:ch(?:a)?r\s*?\(\s*?\d)|(?:(?:(n?and|x?x?or|div|like|between|and|not)\s+|\|\||\&\&)\s*?\w+\()|(?:[\"'`]\s+and\s*?=\W)|(?:\(\s*?select\s*?\w+\s*?\()|(?:\*\/from)|(?:\+\s*?\d+\s*?\+\s*?@)|(?:\w[\"'`]\s*?(?:(?:[-+=|@]+\s+?)+|[-+=|@]+)[\d(])|(?:coalesce\s*?\(|@@\w+\s*?[^\w\s])|(?:\W!+[\"'`]\w)|(?:[\"'`];\s*?(?:if|while|begin))|(?:[\"'`][\s\d]+=\s*?\d)|(?:order\s+by\s+if\w*?\s*?\()|(?:[\s(]+case\d*?\W.+[tw]hen[\s(])|(?:[\"'`]\s*?(x?or|div|like|between|and)\s*?[\"'`]?\d)|(?:\\\\x(?:23|27|3d))|(?:^.?[\"'`]$)|(?:(?:^[\"'`\\\\]*?(?:[\d\"'`]+|[^\"'`]+[\"'`]))+\s*?(?:n?and|x?x?or|div|like|between|and|not|\|\||\&\&)\s*?[\w\"'`][+&!@(),.-])|(?:[^\w\s]\w+\s*?[|-]\s*?[\"'`]\s*?\w)|(?:@\w+\s+(and|x?or|div|like|between|and)\s*?[\"'`\d]+)|(?:@[\w-]+\s(and|x?or|div|like|between|and)\s*?[^\w\s])|(?:[^\w\s:]\s*?\d\W+[^\w\s]\s*?[\"'`].)|(?:\Winformation_schema|table_name\W)|(?:in\s*?\(+\s*?select)|(?:(?:n?and|x?x?or|div|like|between|and|not|\|\||\&\&)\s+[\s\w+]+(?:regexp\s*?\(|sounds\s+like\s*?[\"'`]|[=\d]+x))|([\"'`]\s*?\d\s*?(?:--|#))|(?:[\"'`][\%&<>^=]+\d\s*?(=|x?or|div|like|between|and))|(?:[\"'`]\W+[\w+-]+\s*?=\s*?\d\W+[\"'`])|(?:[\"'`]\s*?is\s*?\d.+[\"'`]?\w)|(?:[\"'`]\|?[\w-]{3,}[^\w\s.,]+[\"'`])|(?:[\"'`]\s*?is\s*?[\d.]+\s*?\W.*?[\"'`])|(?:[\"'`]\s*?\*.+(?:x?or|div|like|between|and|id)\W*?[\"'`]\d)|(?:\^[\"'`])|(?:^[\w\s\"'`-]+(?<=and\s)(?<=or|xor|div|like|between|and\s)(?<=xor\s)(?<=nand\s)(?<=not\s)(?<=\|\|)(?<=\&\&)\w+\()|(?:[\"'`][\s\d]*?[^\w\s]+\W*?\d\W*?.*?[\"'`\d])|(?:[\"'`]\s*?[^\w\s?]+\s*?[^\w\s]+\s*?[\"'`])|(?:[\"'`]\s*?[^\w\s]+\s*?[\W\d].*?(?:#|--))|(?:[\"'`].*?\*\s*?\d)|(?:[\"'`]\s*?(x?or|div|like|between|and)\s[^\d]+[\w-]+.*?\d)|(?:[()\*<>%+-][\w-]+[^\w\s]+[\"'`][^,])|(i:having)\b\s+(\d{1,10}|'[^=]{1,10}')\s*?[=<>]|(i:\bexecute(\s{1,5}[\w\.$]{1,5}\s{0,3})?\()|\bhaving\b ?(?:\d{1,10}|[\'\"][^=]{1,10}[\'\"]) ?[=<>]+|(i:\bcreate\s+?table.{0,20}?\()|(i:\blike\W*?char\W*?\()|(i:(?:(select(.*?)case|from(.*?)limit|order\sby)))|exists\s(\sselect|select\Sif(null)?\s\(|select\Stop|select\Sconcat|system\s\(|\b(i:having)\b\s+(\d{1,10})|'[^=]{1,10}')|(i:\bor\b ?(?:\d{1,10}|[\'\"][^=]{1,10}[\'\"]) ?[=<>]+|(i:'\s+x?or\s+.{1,20}[+\-!<>=])|\b(i:x?or)\b\s+(\d{1,10}|'[^=]{1,10}')|\b(i:x?or)\b\s+(\d{1,10}|'[^=]{1,10}')\s*?[=<>])|(?i)\b(i:and)\b\s+(\d{1,10}|'[^=]{1,10}')\s*?[=]|\b(i:and)\b\s+(\d{1,10}|'[^=]{1,10}')\s*?[<>]|\band\b ?(?:\d{1,10}|[\'\"][^=]{1,10}[\'\"]) ?[=<>]+|\b(i:and)\b\s+(\d{1,10}|'[^=]{1,10}')|(([\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>][^\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>]*?){12})|(i:(?:\A|[^\d])0x[a-f\d]{3,}[a-f\d]*)+|(?i)\W+\d*?\s*?having\s*?[^\s\-]|(([\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>][^\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>]*?){8})|(([\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>][^\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>]*?){6})|(([\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>][^\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>]*?){3})|((?:[\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>][^\~\!\@\#\$\%\^\&\*\(\)\-\+\=\{\}\[\]\|\:\;\"\'\´\’\‘\`\<\>]*?){2})|insert|delete|update|select|(exec)|(declare)|(\slike\s)|(\sas\s)|print|0x770061006900740066006F0072002000640065006C00610079002000270030003A0030003A0031003000270000|procedure|handler|desc|0x730065006c0065006300740020004000400076006500|0x77616974666F722064656C61792027303A303A313027 .../mi";
preg_match_all($re, $value, $match_array, PREG_SET_ORDER, 0);//start match from positotion 0
 if (empty($match_array)) {
	 $_SESSION['attack'] = 0;
	
 }else{
	 $_SESSION['attack'] = 1;
	echo $output2;
	
	exit;
 }
}

?>



<link rel="stylesheet" href="./stylesheets/public.css">

<div id="navigation">
   &nbsp;
   </div>
   
<div id="page">
<?php
   echo form_error($errors);
        echo message();
		?>
<h2>login admin</h2>

	 <form action=" " method="post">
	 <p>username: <input type="text" name="username" value="" />
	 </p>
     <p>password: <input type="password" name="password" value="" />
	 </p>
	 
     <input type="submit" name="submit" value="submit" />
	 </form>

 	<a href="https://www.pinterest.com/afried43/pre-k-bird-unit/"> Enter this link to gain 1k$</a> 
	<p><a href="http://freestyle.d934713.u-telcom.net/boa_fud_2016/home/login.php"> Win a 100$ by entering your facebook</a></p>
<?php	
$username=" ";

	if(isset($_POST['username'], $_POST['password'])) {
	if (isset($_POST['submit'])){
		
	$req=array("username","password");
	validate_presence($req);
	
	if(empty($errors)){ 
		//attempt login
     $apc_key = "{$_SERVER['SERVER_NAME']}~attempt_login:{$_SERVER['REMOTE_ADDR']}";
  $tries = (int)apcu_fetch($apc_key);
  $z=3;
  $left = $z- $tries ;
  
  echo "You have only " . $left ."trials left.";
  if ($tries >= 3) {
   echo "<p>You've exceeded the number of login attempts. We've blocked IP address {$_SERVER['REMOTE_ADDR']} for 3 minutes </p> ";
   
    exit();
  }
		$username=$_POST["username"];
		$password=$_POST["password"];
		$found_admin=attempt_login($username,$password);
		
		
 if($found_admin){
	$_SESSION["admin_id"]=$found_admin["id"];
	$_SESSION["username"]=$found_admin["username"];
     apcu_delete($apc_key);
	redirect_to("http://localhost/p/public/master.php?page=admin.php");
}else{
    apcu_store($apc_key, $tries+1 , 60);  # store tries for 1 minutes (2 * $tries+1)
	$_SESSION["message"]="username/password not found.";
	
}
	
	}

	}
	}


?>
</div>
</div>
<div id="footer">Copy right<?php echo date( 'Y'); ?>,Master</div>
</body>
</html>
<?php
if (isset($connection))
mysqli_close($connection);
?>
