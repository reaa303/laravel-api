<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Product</title>
<style>
 body{font-family:system-ui; padding:16px; background:#f3f4f6}
 form{max-width:500px; margin:auto; background:white; padding:24px; border-radius:8px}
 label{display:block; margin-top:16px; font-weight:bold; font-size:14px}
 input, textarea{width:100%; padding:12px; margin-top:6px; box-sizing:border-box; border:1px solid #ccc; border-radius:6px; font-size:16px}
 .error{color:#dc2626; font-size:12px; margin-top:4px; min-height:16px}
 button{width:100%; height:48px; background:black; color:white; margin-top:24px; border:none; border-radius:6px; font-weight:bold}
 button:focus{outline:3px solid #2563eb}
</style>
</head>
<body>
<h1>Add Product Form</h1>
<form id="form">
 <label for="name">Product Name (required, min 3 chars)</label>
 <input id="name" name="name" required minlength="3" placeholder="e.g. Widget A">
 <div id="name-error" class="error"></div>

 <label for="price">Price (required, >=0)</label>
 <input id="price" name="price" type="number" min="0" step="0.01" required placeholder="e.g. 20">
 <div id="price-error" class="error"></div>

 <label for="desc">Description (optional, max 255)</label>
 <textarea id="desc" name="description" maxlength="255" rows="3" placeholder="e.g. Test product"></textarea>

 <button type="submit">Submit Product</button>
</form>
<p><a href="/ui">Back to List</a></p>
<script>
document.getElementById('form').addEventListener('submit', async (e)=>{
 e.preventDefault();
 const name=document.getElementById('name').value.trim();
 const price=parseFloat(document.getElementById('price').value);
 const desc=document.getElementById('desc').value;
 document.getElementById('name-error').textContent='';
 document.getElementById('price-error').textContent='';
 if(!name){document.getElementById('name-error').textContent='Name required'; return;}
 if(name.length<3){document.getElementById('name-error').textContent='Min 3 chars'; return;}
 if(isNaN(price) || price<0){document.getElementById('price-error').textContent='Price must be >=0'; return;}
 // submit to API
 const res=await fetch('/api/products',{method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({name, price, description:desc})});
 if(res.ok){window.location.href='/ui';} else {alert('Failed to save');}
});
</script>
</body>
</html>
