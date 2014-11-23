<html>
<head>
</head>
<body>

<!--<form action="javascript:void(0);" method="post">-->
<form action="getResult.php" method="post">
    <input type="text" name="text" placeholder="enter a text" />
    <input type="submit" value="submit" />
</form>
8
69
70
<div>
  <a href="#" id="start_button" onclick="startDictation(event)">Dictate</a>
</div>
 
<div id="results">
  <span id="final_span" class="final"></span>
  <span id="interim_span" class="interim"></span>
</div>
 
<script type="text/javascript">
var final_transcript = '';
var recognizing = false;
 
if ('webkitSpeechRecognition' in window) {
 
  var recognition = new webkitSpeechRecognition();
 
  recognition.continuous = true;
  recognition.interimResults = true;
 
  recognition.onstart = function() {
    recognizing = true;
  };
 
  recognition.onerror = function(event) {
    console.log(event.error);
  };
 
  recognition.onend = function() {
    recognizing = false;
  };
 
  recognition.onresult = function(event) {
    var interim_transcript = '';
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    final_transcript = capitalize(final_transcript);
    final_span.innerHTML = linebreak(final_transcript);
    interim_span.innerHTML = linebreak(interim_transcript);
    
  };
}
 
var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}
 
function capitalize(s) {
  return s.replace(s.substr(0,1), function(m) { return m.toUpperCase(); });
}
 
function startDictation(event) {
  if (recognizing) {
    recognition.stop();
    return;
  }
  final_transcript = '';
  recognition.lang = 'en-US';
  recognition.start();
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
}
</script>

<? 
require 'google_speech.php';

$s = new cgoogle_speech('put your API key here'); 

$output = $s->process('@test.flac', 'en-US', 8000);      

print_r($output);
?>

<!--
<script type="text/javascript">
    $("form").submit(function(){
        var str = $(this).serialize();
        $.ajax('getResult.php', str, function(result){
            alert(result); 
        }
        return(false);
    });
</script>
-->
</body>
</html>
