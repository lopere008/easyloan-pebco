<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EasyLoan — Le crédit accessible, simplement</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --ink:#181C22;
    --paper:#FAF8F3;
    --paper-dim:#EFEAE0;
    --navy:#12233B;
    --navy-2:#1A3357;
    --brand:#D9631E;
    --brand-dark:#B04C14;
    --brand-soft:#F4DCC9;
    --line: rgba(18,35,59,.14);
    --radius: 10px;
  }
  *{box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{
    margin:0;
    background:var(--paper);
    color:var(--ink);
    font-family:'Work Sans', sans-serif;
    -webkit-font-smoothing:antialiased;
  }
  h1,h2,h3,.display{
    font-family:'Work Sans', sans-serif;
    font-weight:800;
    letter-spacing:-0.01em;
    margin:0;
  }
  .mono{font-family:'IBM Plex Mono', monospace;}
  a{color:inherit;text-decoration:none;}
  img{max-width:100%;display:block;}
  .wrap{max-width:1180px;margin:0 auto;padding:0 28px;}
  @media(max-width:640px){.wrap{padding:0 18px;}}

  /* ---------- topbar ---------- */
  .topbar{background:var(--navy);color:#E4E9EF;font-size:13px;}
  .topbar .wrap{display:flex;justify-content:space-between;align-items:center;height:38px;}
  .topbar a{opacity:.85;}
  .topbar .contact{display:flex;gap:22px;}
  @media(max-width:700px){.topbar .contact span:nth-child(2){display:none;}}

  /* ---------- header ---------- */
  header.site{position:sticky;top:0;z-index:40;background:var(--paper);border-bottom:1px solid var(--line);}
  nav.main{display:flex;align-items:center;justify-content:space-between;height:76px;}
  .logo{display:flex;align-items:center;gap:10px;font-weight:800;font-size:21px;color:var(--navy);}
  .logo .mark{
    width:36px;height:36px;border-radius:8px;background:var(--navy);
    display:flex;align-items:center;justify-content:center;color:#fff;font-size:15px;font-weight:800;
  }
  .navlinks{display:flex;gap:30px;font-size:14px;font-weight:600;color:var(--navy);}
  .navlinks a{position:relative;padding:6px 0;}
  .navlinks a:after{content:"";position:absolute;left:0;right:0;bottom:0;height:2px;background:var(--brand);transform:scaleX(0);transition:transform .2s ease;}
  .navlinks a:hover:after{transform:scaleX(1);}
  .navcta{display:flex;gap:12px;align-items:center;}
  .btn{display:inline-flex;align-items:center;gap:8px;padding:10px 20px;border-radius:6px;font-weight:700;font-size:13.5px;border:1px solid transparent;cursor:pointer;transition:transform .15s ease;}
  .btn:hover{transform:translateY(-1px);}
  .btn-brand{background:var(--brand);color:#fff;}
  .btn-brand:hover{background:var(--brand-dark);}
  .btn-line{border-bottom:2px solid var(--navy);border-radius:0;padding:10px 0;color:var(--navy);}
  @media(max-width:900px){.navlinks{display:none;}}

  /* ---------- hero ---------- */
  .hero{
    position:relative;
    background: var (--navy);
    color:#EEF1F5;
    overflow:hidden;
  }
  .hero:before{
    content:"";position:absolute;inset:0;
    background:radial-gradient(650px 420px at 85% 10%, rgba(217,99,30,.25), transparent 60%);
    pointer-events:none;
  }
  .hero-inner{position:relative;z-index:1;padding:80px 0 64px;max-width:680px;}
  .eyebrow{
    display:inline-flex;align-items:center;gap:8px;font-family:'IBM Plex Mono',monospace;font-size:12px;
    letter-spacing:.06em;color:var(--brand-soft);text-transform:uppercase;
    border:1px solid rgba(244,220,201,.35);padding:6px 14px;border-radius:999px;margin-bottom:22px;
  }
  .eyebrow .dot{width:6px;height:6px;border-radius:50%;background:var(--brand);}
  .hero h1{font-size:clamp(32px,4.4vw,52px);line-height:1.08;color:#fff;}
  .hero h1 em{font-style:normal;color:var(--brand-soft);}
  .hero p.lead{margin-top:20px;font-size:16.5px;line-height:1.6;color:#C7D0DA;max-width:520px;}
  .hero-actions{display:flex;gap:14px;margin-top:30px;flex-wrap:wrap;}
  .btn-outline-light{border:1px solid rgba(238,241,245,.4);color:#EEF1F5;}
  .hero{ position:relative; overflow:hidden; }

  .hero-bg-layer{
    position:absolute;
    inset:0;
    background-size:cover;
    background-position:center;
    opacity:0;
    transition:opacity 1.8s ease-in-out;
    z-index:0;
  }
  .hero-bg-layer.active{ opacity:1; }

  /* overlay navy + touche orange, posé au-dessus des deux calques */
  .hero:before{
    content:"";
    position:absolute;
    inset:0;
    z-index:1;
    background:
      linear-gradient(180deg, rgba(18,35,59,.88), rgba(18,35,59,.78)),
      radial-gradient(650px 420px at 85% 10%, rgba(217,99,30,.25), transparent 60%);
    pointer-events:none;
  }

  .hero-inner{ position:relative; z-index:2; }

  /* ---------- stats band (juste sous le hero, comme sur padme.bj) ---------- */
  .stats-band{background:var(--paper-dim);border-bottom:1px solid var(--line);}
  .stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;text-align:center;padding:36px 0;}
  @media(max-width:700px){.stats-grid{grid-template-columns:1fr 1fr;}}
  .stats-grid b{display:block;font-family:'IBM Plex Mono',monospace;font-size:clamp(24px,2.8vw,32px);color:var(--navy);}
  .stats-grid span{font-size:12px;color:#556;}

  /* ---------- section header ---------- */
  .section{padding:80px 0;}
  .section.tight{padding:56px 0;}
  .sec-head{display:flex;justify-content:space-between;align-items:flex-end;gap:24px;margin-bottom:40px;flex-wrap:wrap;}
  .sec-eyebrow{font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:var(--brand-dark);margin-bottom:10px;display:block;}
  .sec-head h2{font-size:clamp(24px,2.8vw,34px);max-width:560px;color:var(--navy);}
  .sec-head p{max-width:400px;font-size:14px;color:#455049;line-height:1.55;}

  /* ---------- offers grid ---------- */
  .offers-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;}
  @media(max-width:900px){.offers-grid{grid-template-columns:1fr 1fr;}}
  @media(max-width:640px){.offers-grid{grid-template-columns:1fr;}}
  .offer-card{background:#fff;border:1px solid var(--line);border-radius:var(--radius);padding:24px;display:flex;flex-direction:column;gap:12px;transition:box-shadow .2s ease, border-color .2s ease;}
  .offer-card:hover{box-shadow:0 16px 32px -18px rgba(18,35,59,.28);border-color:transparent;}
  .offer-tag{width:44px;height:44px;border-radius:8px;background:var(--paper-dim);display:flex;align-items:center;justify-content:center;font-size:19px;}
  .offer-card.featured{background:var(--navy);color:#EEF1F5;border-color:var(--navy);}
  .offer-card.featured .offer-tag{background:rgba(255,255,255,.1);}
  .offer-card.featured .offer-desc{color:#B9C4D1;}
  .offer-card h3{font-size:17px;line-height:1.25;font-weight:700;color:var(--navy);}
  .offer-card.featured h3{color:#fff;}
  .offer-desc{font-size:13.5px;line-height:1.55;color:#4B564F;flex:1;}
  .offer-link{font-size:13px;font-weight:700;display:inline-flex;align-items:center;gap:6px;margin-top:auto;color:var(--brand-dark);}
  .offer-card.featured .offer-link{color:var(--brand-soft);}
  .offer-link:after{content:"→";}
  .badge{align-self:flex-start;font-family:'IBM Plex Mono',monospace;font-size:11px;background:var(--brand-soft);color:var(--brand-dark);padding:4px 10px;border-radius:999px;}
  .offer-card.featured .badge{background:var(--brand);color:#fff;}

  /* ---------- étapes (adapté du 1er landing, mêmes tokens navy/brand) ---------- */
  .steps{display:grid;grid-template-columns:repeat(4,1fr);gap:0;border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;background:#fff;}
  @media(max-width:900px){.steps{grid-template-columns:1fr 1fr;}}
  @media(max-width:560px){.steps{grid-template-columns:1fr;}}
  .step{padding:28px 24px;border-right:1px solid var(--line);}
  @media(max-width:900px){.step:nth-child(2){border-right:none;}}
  @media(max-width:560px){.step{border-right:none;border-bottom:1px solid var(--line);}
    .step:last-child{border-bottom:none;}}
  .step:last-child{border-right:none;}
  .step .num{font-family:'IBM Plex Mono',monospace;color:var(--brand);font-size:13px;margin-bottom:12px;display:block;}
  .step h4{font-size:16px;font-weight:700;margin-bottom:8px;color:var(--navy);}
  .step p{font-size:13.5px;color:#4B564F;line-height:1.5;margin:0;}

  /* ---------- services aux usagers (structure fidèle à padme.bj) ---------- */
  .services-panel{display:grid;grid-template-columns:1fr 1.1fr;gap:0;border:1px solid var(--line);border-radius:var(--radius);overflow:hidden;background:#fff;}
  @media(max-width:800px){.services-panel{grid-template-columns:1fr;}}
  .services-list{padding:32px;border-right:1px solid var(--line);}
  @media(max-width:800px){.services-list{border-right:none;border-bottom:1px solid var(--line);}}
  .services-list h3{font-size:15px;color:var(--navy);margin-bottom:16px;}
  .services-list ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;}
  .services-list li a{display:block;padding:11px 0;border-bottom:1px solid var(--line);font-size:14px;font-weight:600;color:var(--navy);}
  .services-list li:last-child a{border-bottom:none;}
  .services-list li a:hover{color:var(--brand-dark);}
  .sim-panel{padding:32px;background:var(--paper-dim);}
  .sim-panel h3{font-size:15px;color:var(--navy);margin-bottom:4px;}
  .sim-sub{font-size:12.5px;color:#556;margin-bottom:20px;}
  .field{margin-bottom:16px;}
  .field label{display:block;font-size:12.5px;font-weight:700;margin-bottom:6px;color:#33453C;}
  .field input[type=range]{width:100%;accent-color:var(--brand);}
  .field-row{display:flex;justify-content:space-between;font-family:'IBM Plex Mono',monospace;font-size:13px;color:var(--navy);}
  .sim-result{margin-top:18px;padding:16px;border-radius:8px;background:var(--navy);color:#EEF1F5;display:flex;justify-content:space-between;align-items:center;}
  .sim-result b{font-family:'IBM Plex Mono',monospace;font-size:20px;color:var(--brand-soft);display:block;}
  .sim-result span{font-size:11px;opacity:.8;}

  /* ---------- testimonial ---------- */
  .testi{background:var(--navy);color:#EEF1F5;border-radius:16px;padding:48px;display:grid;grid-template-columns:auto 1fr;gap:28px;align-items:center;}
  @media(max-width:700px){.testi{grid-template-columns:1fr;padding:30px;}}
  .testi .avatar{width:58px;height:58px;border-radius:50%;background:var(--brand);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:20px;color:#fff;}
  .testi p{font-size:clamp(17px,2vw,21px);line-height:1.45;font-weight:600;}
  .testi footer{margin-top:12px;font-size:13px;color:#B9C4D1;}

  /* ---------- footer ---------- */
  footer.site{background:var(--ink);color:#C9D2CB;padding:56px 0 26px;}
  .foot-grid{display:grid;grid-template-columns:1.3fr 1fr 1fr 1fr 1fr;gap:32px;padding-bottom:40px;border-bottom:1px solid rgba(255,255,255,.08);}
  @media(max-width:900px){.foot-grid{grid-template-columns:1fr 1fr 1fr;}}
  @media(max-width:600px){.foot-grid{grid-template-columns:1fr 1fr;}}
  footer.site h5{font-size:12px;letter-spacing:.06em;text-transform:uppercase;color:#8FA095;margin-bottom:14px;font-weight:700;}
  footer.site ul{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:9px;font-size:13.5px;}
  footer.site a:hover{color:#fff;}
  footer.site .nlform{display:flex;gap:0;margin-top:6px;}
  footer.site .nlform input{flex:1;border:1px solid rgba(255,255,255,.15);background:transparent;color:#fff;padding:9px 10px;font-size:13px;border-radius:6px 0 0 6px;}
  footer.site .nlform button{background:var(--brand);color:#fff;border:none;padding:9px 14px;font-size:13px;font-weight:700;border-radius:0 6px 6px 0;cursor:pointer;}
  .foot-bottom{display:flex;justify-content:space-between;padding-top:22px;font-size:12px;color:#7C8B81;flex-wrap:wrap;gap:10px;}

  ::selection{background:var(--brand-soft);}
</style>
</head>
<body>

<div class="topbar">
  <div class="wrap">
    <div class="contact">
      <span>📞 (+229) 01 21 60 26 81</span>
      
    </div>
   
      
      
    
  </div>
</div>

<header class="site">
  <div class="wrap">
    <nav class="main">
      <div class="logo"><span class="mark">EP</span> EasyLoan PEBCo</div>
      <div class="navlinks">
        <a href="#comment">Comment ça marche</a>
        <a href="#offres">Produits et services</a>
        <a href="#simulateur">Simulateur de crédit</a>
        <a href="#contact">Contact</a>
      </div>
      <div class="navcta">
        <a class="btn btn-line" href="{{ route('login') }}" class="border-2 border-blue-600 text-blue-600 font-semibold text-sm px-5 py-2 rounded-lg hover:bg-blue-50">Se connecter</a>
        <a class="btn btn-line" href="{{ route('client.login') }}" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700">Espace client</a>
        
      </div>
    </nav>
  </div>
</header>

<section class="hero">
  <div class="hero-bg-layer" style="background-image:url('{{ asset('images/hero-bg-1.jpg') }}')"></div>
  <div class="hero-bg-layer" style="background-image:url('{{ asset('images/hero-bg-2.jpg') }}')"></div>

  <div class="wrap hero-inner">
    <span class="eyebrow"><span class="dot"></span> Système financier décentralisé — Bénin</span>
    <h1>Le crédit qui <em>fait grandir</em><br>votre activité.</h1>
    <p class="lead">PEBCo-BETHESDA rend la demande de prêt accessible en ligne : plus besoin de multiplier les déplacements en agence pour suivre votre dossier, du dépôt de la demande jusqu'au décaissement.</p>
    <div class="hero-actions">
      <a class="btn btn-brand" href="#offres">Accès aux produits et services →</a>
      <a class="btn btn-outline-light" href="#simulateur">Simuler ma mensualité</a>
    </div>
  </div>
</section>

<section class="stats-band">
  <div class="wrap stats-grid">
    <div><b>51 800+</b><span>Nombre total de crédits déboursés</span></div>
    <div><b>21,2 Mds</b><span>FCFA de crédits déboursés</span></div>
    <div><b>620+</b><span>Nb. total de crédits en cours</span></div>
    <div><b>23,9 Mds</b><span>FCFA d'encours de crédit</span></div>
  </div>
</section>

<section class="section tight" id="comment">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="sec-eyebrow">Comment ça marche</span>
        <h2>De la demande au décaissement</h2>
      </div>
      <p>Votre compte est créé en agence, puis tout le suivi de votre prêt se fait en ligne, en toute transparence.</p>
    </div>
    <div class="steps">
      <div class="step">
        <span class="num">01</span>
        <h4>Recevez votre code</h4>
        <p>Votre compte est créé par l'agence, vous recevez un code d'accès personnel.</p>
      </div>
      <div class="step">
        <span class="num">02</span>
        <h4>Faites votre demande</h4>
        <p>Montant, durée, pièces justificatives… le tout en ligne, en quelques minutes.</p>
      </div>
      <div class="step">
        <span class="num">03</span>
        <h4>Suivez en temps réel</h4>
        <p>Statut, observations du chargé de crédit, décision : tout au même endroit.</p>
      </div>
      <div class="step">
        <span class="num">04</span>
        <h4>Décaissement</h4>
        <p>Les fonds sont mis à disposition et le suivi de remboursement démarre.</p>
      </div>
    </div>
  </div>
</section>

<section class="section tight" id="offres" style="border-top:1px solid var(--line);">
  <div class="wrap">
    <div class="sec-head">
      <div>
        <span class="sec-eyebrow">Produits et services</span>
        <h2>Un crédit pensé pour chaque activité</h2>
      </div>
      <p>Des produits financiers et d'épargne adaptés aux commerçants, agriculteurs et porteurs de projets, avec un accompagnement en agence.</p>
    </div>

    <div class="offers-grid">
      <div class="offer-card featured">
        <span class="badge">Le plus demandé</span>
        <div class="offer-tag">🌾</div>
        <h3>Crédit warrantage</h3>
        <p class="offer-desc">Destiné aux producteurs de soja, maïs, arachide, niébé et autres cultures : financez le stockage de votre récolte pour la revendre au meilleur moment.</p>
        <a class="offer-link" href="#">En savoir plus</a>
      </div>
      <div class="offer-card">
        <div class="offer-tag">🌱</div>
        <h3>Investissement &amp; production</h3>
        <p class="offer-desc">Un levier de financement pour les projets agricoles : matériel, intrants, main-d'œuvre. Pensé pour ceux qui veulent passer à l'échelle supérieure.</p>
        <a class="offer-link" href="#">En savoir plus</a>
      </div>
      <div class="offer-card">
        <div class="offer-tag">💼</div>
        <h3>Activités génératrices de revenus</h3>
        <p class="offer-desc">Fonds de roulement, projet ou investissement : le crédit classique pour financer et développer une activité commerciale ou artisanale existante.</p>
        <a class="offer-link" href="#">En savoir plus</a>
      </div>
      <div class="offer-card">
        <div class="offer-tag">🤝</div>
        <h3>Engagement par signature</h3>
        <p class="offer-desc">Une garantie qui permet d'accéder à d'autres financements sans mobiliser immédiatement de trésorerie.</p>
        <a class="offer-link" href="#">En savoir plus</a>
      </div>
      <div class="offer-card">
        <div class="offer-tag">🏦</div>
        <h3>Ouverture de compte</h3>
        <p class="offer-desc">La porte d'entrée vers l'ensemble des services : ouvrez un compte simplement, en agence ou en ligne.</p>
        <a class="offer-link" href="#">En savoir plus</a>
      </div>
      <div class="offer-card">
        <div class="offer-tag">🔄</div>
        <h3>Tontine digitale</h3>
        <p class="offer-desc">La tontine traditionnelle, modernisée : versements réguliers suivis depuis votre téléphone.</p>
        <a class="offer-link" href="#">En savoir plus</a>
      </div>
    </div>
  </div>
</section>

<section class="section tight" style="border-top:1px solid var(--line);" id="simulateur">
  <div class="wrap">
    
      <div class="sim-panel">
        <h3>Simulateur de crédit</h3>
        <p class="sim-sub">Estimation indicative — à affiner avec un conseiller.</p>
        <div class="field">
          <label>Montant souhaité</label>
          <input type="range" id="amount" min="50000" max="5000000" step="50000" value="500000">
          <div class="field-row"><span id="amountVal">500 000 FCFA</span><span>50k – 5M</span></div>
        </div>
        <div class="field">
          <label>Durée de remboursement</label>
          <input type="range" id="duration" min="3" max="36" step="1" value="12">
          <div class="field-row"><span id="durationVal">12 mois</span><span>3 – 36 mois</span></div>
        </div>
        <div class="sim-result">
          <div>
            <span>Mensualité estimée</span>
            <b id="monthlyVal">45 833 FCFA</b>
          </div>
          <a class="btn btn-brand" href="#" style="padding:8px 14px;font-size:12.5px;">Demander</a>
        </div>
      </div>
    
  </div>
</section>

<section class="section" id="publications">
  <div class="wrap">
    <div class="testi">
      <div class="avatar">A.</div>
      <div>
        <p>« J'ai commencé avec un petit stock. Grâce au financement, j'ai pu élargir mon activité et embaucher deux personnes de plus dans mon commerce. »</p>
        <footer>Cliente ; commerçante à Cotonou</footer>
      </div>
    </div>
  </div>
</section>

<footer class="site" id="contact">
  <div class="wrap">
    <div class="foot-grid">
      <div>
        <div class="logo" style="color:#fff;"><span class="mark">EP</span> EasyLoan PEBCo</div>
        <p style="font-size:13px;line-height:1.6;margin-top:14px;max-width:260px;">Système financier décentralisé au service des commerçants, artisans et producteurs du Bénin.</p>
      </div>
      <div>
        <h5>Plan du site</h5>
        <ul>
          <li><a href="#">Accueil</a></li>
          <li><a href="#comment">Comment ça marche</a></li>
          <li><a href="#offres">Produits et services</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div>
        <h5>Contact</h5>
        <ul>
          <li> Sainte Rita Cotonou, Bénin</li>
          <li>(+229) 01 21 60 26 81</li>
          
        </ul>
      </div>
      
      <div>
        <h5>Newsletter</h5>
        <p style="font-size:13px;margin-bottom:10px;">Recevez nos actualités et nouvelles offres.</p>
        <div class="nlform">
          <input type="email" placeholder="Votre email">
          <button>S'abonner</button>
        </div>
      </div>
    </div>
    <div class="foot-bottom">
      <span>© 2026 EasyLoan. Tous droits réservés.</span>
    </div>
  </div>
</footer>

<script>
  const amount = document.getElementById('amount');
  const duration = document.getElementById('duration');
  const amountVal = document.getElementById('amountVal');
  const durationVal = document.getElementById('durationVal');
  const monthlyVal = document.getElementById('monthlyVal');
  const fmt = n => n.toLocaleString('fr-FR').replace(/,/g,' ');

  function update(){
    const a = parseInt(amount.value);
    const d = parseInt(duration.value);
    const rate = 0.015;
    const monthly = Math.round((a * (1+rate*d)) / d);
    amountVal.textContent = fmt(a) + ' FCFA';
    durationVal.textContent = d + ' mois';
    monthlyVal.textContent = fmt(monthly) + ' FCFA';
  }
  amount.addEventListener('input', update);
  duration.addEventListener('input', update);
  update();
</script>
<script>
  const bgLayers = document.querySelectorAll('.hero-bg-layer');
  let current = 0;
  bgLayers[0].classList.add('active');

  setInterval(() => {
    bgLayers[current].classList.remove('active');
    current = (current + 1) % bgLayers.length;
    bgLayers[current].classList.add('active');
  }, 6000); 
</script>
</body>
</html>