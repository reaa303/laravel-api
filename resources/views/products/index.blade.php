<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Product List Dashboard</title>
<style>
 body{font-family:system-ui; padding:16px; background:#f3f4f6}
 #list{min-height:200px; background:#fff; padding:16px; border-radius:8px}
 li{padding:8px; border-bottom:1px solid #eee}
</style>
</head>
<body>
<h1>Product List Dashboard</h1>
<a href="/ui/create">+ Add Product</a>
<ul id="list"></ul>
<script>
fetch('/api/products').then(r=>r.json()).then(products=>{
 const list=document.getElementById('list');
 products.forEach(p=>{
  const el=document.createElement('li');
  el.textContent = p.name + ' - ' + p.price;
  list.appendChild(el);
 });
});
</script>
</body>
</html>
