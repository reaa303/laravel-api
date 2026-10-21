<meta name="viewport" content="width=device-width, initial-scale=1">
<h1>Product List Dashboard</h1>
<a href="/ui/create"><button style="height:48px;width:170px;background:#2563EB;color:white;border-radius:8px">+ Add New Product</button></a>
<div id="list" style="margin-top:16px"></div>
<script>
fetch('/api/products').then(r=>r.json()).then(d=>{
  const list=document.getElementById('list');
  list.innerHTML=d.map(p=>{
    let el=document.createElement('div');
    el.textContent=`${p.name} - ${p.price}`;
    return `<p>${el.textContent}</p>`;
  }).join('');
});
</script>
