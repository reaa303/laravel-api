<meta name="viewport" content="width=device-width, initial-scale=1">
<h1>Add Product</h1>
<form id="form">
<label>Name *</label><br>
<input id="name" required minlength="3" style="width:100%;height:48px"><br><br>
<label>Price in PHP *</label><br>
<input id="price" type="number" required min="1" style="width:100%;height:48px"><br><br>
<label>Description</label><br>
<textarea id="desc" style="width:100%"></textarea><br><br>
<button type="submit" style="height:48px;width:170px;background:#2563EB;color:white;border-radius:8px">Add New Product +</button>
<p id="error" style="color:red"></p>
</form>
<script>
document.getElementById('form').onsubmit=async(e)=>{
  e.preventDefault();
  const name=document.getElementById('name');
  const price=document.getElementById('price');
  const desc=document.getElementById('desc');
  const error=document.getElementById('error');
  if(!name.value){error.textContent='Name is required';return}
  if(price.value<1){error.textContent='Price must be at least 1';return}
  let r=await fetch('/api/products',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({name:name.value,price:price.value,description:desc.value})});
  if(r.status==201){alert('Success!');location='/ui'}
  else{error.textContent='Failed';}
}
</script>
