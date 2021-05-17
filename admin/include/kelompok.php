<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
*{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
}
.team-section{
  overflow: hidden;
  text-align: center;
  background: #d08752;
  padding: 60px;
}
.team-section h1{
  text-transform: uppercase;
  margin-bottom: 60px;
  color: white;
  font-size: 40px;
}
.border{
  display: block;
  margin: auto;
  width: 160px;
  height: 3px;
  background:#fffaa4;
  margin-bottom: 40px;
}
.ps{
  margin-bottom: 40px;
}
.ps a{
  display: inline-block;
  margin: 0 30px;
  width: 160px;
  height: 160px;
  overflow: hidden;
  border-radius: 50%;
}
.ps a img{
  width: 100%;
}
.section{
  width: 600px;
  margin: auto;
  color: white;
  font-size: 20px;
  text-align:center;
  height: 0;
  overflow: hidden;
}
.nama{
  display: block;
  margin-bottom: 30px;
  text-align: center;
  text-transform: uppercase;
  font-size: 22px;
}
.section:target{
  height: auto;
}
</style>
</head>
<body>

<div class="team-section">
  <h1>Our Team</h1>
  <div class="ps">
    <a href="#p1"><img src="foto/galih.jpeg" alt="galih"></a>
    <a href="#p2"><img src="foto/mada.jpeg" alt="galih"></a>
    <a href="#p3"><img src="foto/nisa.jpeg" alt="galih"></a>
  </div>

  <div class="section" id="p1">
    <span class="nama">Galih Pratama</span>
    <span class="border"></span>
    <p>193140914111052</p>
  </div>
  <div class="section" id="p2">
    <span class="nama">Selvi Madania Elwina</span>
    <span class="border"></span>
    <p>193140914111058</p>
  </div>
  <div class="section" id="p3">
    <span class="nama">Nur Evatul Nisa</span>
    <span class="border"></span>
    <p>193140914111062</p>
  </div>
</div>

</body>
</html>
