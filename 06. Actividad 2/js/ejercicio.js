function accionPlay()
{
	if(!medio.paused && !medio.ended) 
	{
		medio.pause();
		play.value='\u25BA'; //\u25BA
    document.body.style.backgroundColor = '#fff';
	}
	else
	{
		medio.play();
		play.value='||';
    document.body.style.backgroundColor = 'grey';
	}
}
function accionReiniciar()
{
  //Usar propiedad .currentTime
  medio.currentTime = 0;
  //Reproducir el vídeo
	medio.play()
  //Cambiar el valor del botón a ||
  play.value='||'
}
function accionRetrasar()
{

	//Usar propiedad .curentTime
	
	
	  //Usar propiedad .curentTime
	  //Contemplar que no existen valores negativos
	  if(medio.currentTime==0)
	  {
		return false;
	  }
	  if(medio.currentTime<=5)
	  {
		medio.currentTime=0;
	  }
	  else
	  {
		medio.currentTime=medio.currentTime-5;
	  }
	

  //Contemplar que no existen valores negativos
}
function accionAdelantar()
{
	if(medio.currentTime==0)
	{
	  return false;
	}
	if(medio.currentTime<=5)
	{
	  medio.currentTime=+5;
	}
	else
	{
	  medio.currentTime=medio.currentTime+5;
	}
  
  //Contemplar que no existen valores mayores a medio.duration	
}
function accionSilenciar()
{
	silencio=document.getElementById('silenciar');
	

	if(silencio){
	
			medio.muted=true;
			silenciar.value='escuchar';
	
	}

	//Utilizar medio.muted = true; o medio.muted = false;
}



function accionMasVolumen()
{
	mayorvolumen=document.getElementById('masVolumen');
	if(mayorvolumen.volume >=0 && mayorvolumen.volume <=1){
		volume=volume+0,1;
	}
	//Contemplar que el valor máximo de volumen es 1
}
function accionMenosVolumen()
{
	menorvolumen=document.getElementById('menosVolumen');
	if(menorvolumen.volume >=0 && menorvolumen.volume <=1){
		volume=volume-0,1;
	}
	//Contemplar que el valor mínimo de volumen es 0
}

function iniciar() 
{
	
	medio=document.getElementById('medio');
	play=document.getElementById('play');
	reiniciar=document.getElementById('reiniciar');
	retrasar=document.getElementById('retrasar');
	adelantar=document.getElementById('adelantar');
	silenciar=document.getElementById('silenciar');

	play.addEventListener('click', accionPlay);
	reiniciar.addEventListener('click', accionReiniciar);
	retrasar.addEventListener('click', accionRetrasar);
	adelantar.addEventListener('click', accionAdelantar);
	silenciar.addEventListener('click', accionSilenciar);
	menosVolumen.addEventListener('click', accionMenosVolumen);
	masVolumen.addEventListener('click', accionMasVolumen);
}

window.addEventListener('load', iniciar, false);