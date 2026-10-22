<meta name='viewport' content='width=device-width,initial-scale=1'>
<h1>Product List Dashboard</h1>
<a href='/ui/create'>+ Add New Product</a>
<div id='list' style='margin-top:20px'></div>
<script>
fetch('/api/products').then(r=>r.json()).then(d=>{
  let list=document.getElementById('list');
  list.innerHTML='';
  d.forEach(p=>{
    let el=document.createElement('div');
    el.textContent=p.name+' - '+p.price;
    list.appendChild(el);
  });
});
</script>
