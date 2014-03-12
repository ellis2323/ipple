Utilisation
===========
<p>Mjpopup est une lightbox entièrement personnalisable, ses fonctionnalitées sont les suivantes :</p>
<ul>
       <li>Optimisé et léger, il peut accepter n'importe quel code css dans sa configuration et contient bon nombre d'autres paramètres.</li>
        <li>mjpopup possède un système de récursivité des paramètres c’est-à-dire que nous pouvons modifier n’importe quel des paramètres sans influer sur les autres</li>

</ul>

<h2>Appel du plugin</h2>

<pre>			
&lt;!-- APPEL DE LA BIBLIOTHEQUE --&gt;
&lt;script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"&gt;&lt;/script&gt;

&lt;!-- APPEL DE MJPOPUP --&gt;
&lt;script type="text/javascript" src="js/jquery.cookie.js"&gt;&lt;/script&gt;
&lt;script type="text/javascript" src="js/mjpopup.min.1.0.0.js"&gt;&lt;/script&gt;

&lt;!-- UTILISATION DU PLUGIN --&gt;
&lt;script type="text/javascript">
//...utilisation de mjpopup
&lt;/script&gt;

</pre>

<h2>Un appel simple avec son exemple</h2>

<pre>
			
jQuery(document).ready(function() {
	jQuery(this).mjpopup();
});

</pre>

<h2>Toutes les fonctionnalitées</h2>

<pre>
jQuery(document).ready(function() {
	jQuery(this).mjpopup({
		//active debug
		'debug' : false,
		//click or no
		'onClick': {
			'active' : false,
			'class' : 'showPopup'
		},
		//cookie
		'cookie' : {
			'active' : false,
			'name' : 'mjpopup',
			'time' : 1
	  	},
		//create overlay
		'overlay': {
			'class': 'popup_overlay',
			'closeOnClick': true,
			'css': {
				'background' : 'url(img/overlay1.png)',
				'backgroundRepeat' : 'repeat',
				'zIndex' : 999,
				'width' : '100%',
				'position' : 'absolute',
				'top' :0,
				'height' : jQuery(document).height()
			}
		},
		//create div popup
		'popup': {
			'class': 'popup_div_view',
			'width': 940,
			'height': 538,
			'css': {
				'borderWidth': 8,
				'borderColor': '#D0D0D0',
				'borderStyle': 'solid',
				'borderRadius': '6px 0px 6px 6px',
				'float' : 'left',
				'height' : '500px',
				'position' : 'relative',
				'zIndex' : 999999
			},
			'htmlpopup' : '&lt;img src="img/mjpopup.jpg" /&gt;'
		},
		//close button
		'close': {
			'text' : 'fermer',//string and One word
			'class' : 'close',
			'EscClose': true,
			'css': {
				'color' : 'black',
				'display' : 'block',
				'float' : 'right',
				'padding' : '4px 9px', //px or em
				'backgroundColor' : '#D0D0D0',
				'fontSize' : '12px', //px
				'borderRadius' : '2px 2px 0 0',
				'textTransform' : 'uppercase',
				'fontWeight' : 'bold',
				'cursor' : 'pointer',
				'zIndex' : 999999
			}
		},
		//effect appearance/disappearance for background
		'effect': {
			'bgIn': 'fade',
			'bgTime' : 800,
			'bgOut' : 'fade',
			'popupIn' : 'slide',
			'popupTime' : 1000,
			'popupOut' : 'slide'
		}
	});
});
</pre>
<h2>Le mode debug</h2>

<pre>
jQuery(document).ready(function() {
	jQuery(this).mjpopup({
		//active debug
		'debug' : true,
		//click or no
		'onClick': {
			'active' : true,
			'class' : 'showPopup'
		},
		//create div popup
		'popup': 
		{
			'width': 'fezfz', &lt;= voici l'erreur
			'height': 365,
			'htmlpopup' : '&lt;img src="img/mjpopup1.jpg" /&gt;',
			'css':
			{
				'height' : '365px',
				'width': '940px'
			}
		}
	});
</pre>

<h2>Plus d'infos</h2>

<p>Je vous invite à télécharger le plugin qui contient une API.</p>
