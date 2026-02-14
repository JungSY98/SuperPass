<!-- views/stats/sankey.php -->
<div class="container py-4">
  <div class="row g-3 align-items-end">
    <div class="col-sm-2">
      <label class="form-label">구분</label>
      <select id="dim" class="form-select">
        <option value="age">Age</option>
        <option value="nation">Nation</option>
        <option value="purpose">Purpose</option>
		<option value="gender">Gender</option>
      </select>
    </div>
    <div class="col-sm-2">
      <label class="form-label">Mode</label>
      <select id="mode" class="form-select">
        <option value="use">Coupon usage</option>
		<option value="click">Clicks</option>
      </select>
    </div>
    <div class="col-sm-3">
      <label class="form-label">From</label>
      <input type="date" id="from" class="form-control">
    </div>
    <div class="col-sm-3">
      <label class="form-label">To</label>
      <input type="date" id="to" class="form-control">
    </div>
    <div class="col-sm-3">
		<div class="d-flex gap-2">
			<button id="btnLoad" class="btn btn-primary flex-grow-1">Load</button>
			<button id="btnExcel" class="btn btn-success flex-grow-1" onclick="fnExcelDownload()">Excel</button>
		</div>
    </div>
  </div>

  <div id="chart" class="mt-4" style="width:100%; height:560px;"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {'packages':['sankey']});
google.charts.setOnLoadCallback(function(){
  document.getElementById('btnLoad').addEventListener('click', draw);
  draw();
});

function draw(){
  const q    = document.getElementById('dim').value;
  const mode = document.getElementById('mode').value;
  const from = document.getElementById('from').value;
  const to   = document.getElementById('to').value;

  const url = `/admin/stat/stats/data?q=${encodeURIComponent(q)}&mode=${encodeURIComponent(mode)}&from=${encodeURIComponent(from)}&to=${encodeURIComponent(to)}`;
  fetch(url).then(r=>r.json()).then(rows => {
    const chartDiv = document.getElementById('chart');

    if (!rows || rows.length === 0) {
      chartDiv.innerHTML = '<div class="alert alert-warning text-center">해당 기간에 데이터가 없습니다. (No data found)</div>';
      return;
    }

    const data = new google.visualization.DataTable();
    data.addColumn('string','From');
    data.addColumn('string','To');
    data.addColumn('number','Weight');
    rows.forEach(r=>{ data.addRow([String(r[0]||'Unknown'), String(r[1]||'Unknown'), Number(r[2]||0)]); });

    const chart = new google.visualization.Sankey(chartDiv);
    chartDiv.innerHTML = ''; // Clear previous message if any (Sankey might overwrite, but good practice)
    chart.draw(data, { sankey: { node: { label: { fontSize: 12 } } } });
  });
}

function fnExcelDownload(){
  const q    = document.getElementById('dim').value;
  const from = document.getElementById('from').value;
  const to   = document.getElementById('to').value;

  location.href = `/admin/stat/stats/excel_download?q=${encodeURIComponent(q)}&from=${encodeURIComponent(from)}&to=${encodeURIComponent(to)}`;
}
</script>
