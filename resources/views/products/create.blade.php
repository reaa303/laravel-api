<!DOCTYPE html>
<html>
<head>
<title>Add Assessment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>body{font-family:Arial;padding:10px} input,button{width:100%;height:40px;margin:5px 0}</style>
</head>
<body>
<h2>Add Assessment</h2>
<form id="form">
<input id="name" placeholder="Student Name - try <b>LAB_TEST</b>" required>
<input id="subject" placeholder="Subject" required>
<input id="grade" placeholder="Grade" required>
<button type="submit">Save</button>
</form>
<a href="/products"><button>Back to List</button></a>
<div id="msg"></div>

<script>
// E3 XSS Protection
function esc(t){
 let d=document.createElement('div');
 d.textContent=t;
 return d.innerHTML;
}

document.getElementById('form').addEventListener('submit', function(e){
 e.preventDefault();
 let data = {
   name: document.getElementById('name').value,
   subject: document.getElementById('subject').value,
   grade: document.getElementById('grade').value
 };
 
 fetch('/api/products',{
   method:'POST',
   headers:{'Content-Type':'application/json'},
   body: JSON.stringify(data)
 }).then(r=>r.json()).then(res=>{
   // SAFE - textContent gamit
   let msg = document.getElementById('msg');
   msg.textContent = 'Saved: ' + data.name;
   document.getElementById('form').reset();
 });
});
</script>
</body>
</html>
