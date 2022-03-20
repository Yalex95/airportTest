<?php
//creacion de la cola
$cola = new SplQueque();
 //añade elementos a la cola
 $cola ->enqueue('1');
 $cola ->enqueue('2');
 $cola ->enqueue('3');

 //mostrar cuantos elementos hahy en la cola
 echo $cola->count();

 //situar el puntero hata el principio de la cola
 $cola->rewind();
  //muestra todos los elementos de la cola
  while ($cola->valid()) {
      echo $cola->current(),PHP_EOL;
      $cola->next;
  }
  //Saca de la cola el primer elemento y  lo muestra
  echo $cola->dequeue();
  echo $cola->dequeue();
  echo $cola->dequeue();
  
 
?>