<!DOCTYPE html>
<html><head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Assessment</title>
<style>
body{font-family:system-ui;padding:16px;background:#f3f4f6}
form{max-width:500px;margin:auto;background:white;padding:24px;border-radius:8px}
label{display:block;margin-top:16px;font-weight:bold;font-size:14px}
input,textarea{width:100%;padding:12px;margin-top:6px;box-sizing:border-box;border:1px solid #ccc;border-radius:6px;font-size:16px}
.error{color:#dc2626;font-size:12px;margin-top:4px;min-height:16px}
button{width:100%;height:48px;background:black;color:white;margin-top:24px;border:none;border-radius:6px;font-weight:bold}
button:focus{outline:3px solid #2563eb}
</style></head><body>
<h1>Add Assessment</h1>
<form id="form">
<label for="name">Student Name (required, min 3 chars)</label>
<input id="name" name="name" required minlength="3" placeholder="e.g. Juan Dela Cruz">
<div id="name-error" class="error"></div>

<label for="price">Grade (required, 0-100)</label>
<input id="price" name="price" type="number" min="0" max="100" required placeholder="e.g. 85">
<div id="price-error" class="error"></div>

<label for="desc">Subject (optional, max 255)</label>
<textarea id="desc" name="description" maxlength="255" rows="3" placeholder="e.g. Math"></textarea>

<button type="submit">Submit Grade</button>
</form>
<p><a href="/ui">Back to List</a></p>
<script>
document.getElementById('form').onsubmit=(e)=>{
e.preventDefault();
let n=document.getElementById('name').value.trim();
let p=document.getElementById('price').value;
let ok=true;
if(n.length<3){document.getElementById('name-error').textContent='Name required min 3';ok=false}else{document.getElementById('name-error').textContent=''}
if(p==''||p<0||p>100){document.getElementById('price-error').textContent='Grade must 0-100';ok=false}else{document.getElementById('price-error').textContent=''}
if(!ok)return;
alert('Saved: '+n+' - Grade '+p);
}
</script></body></html>
