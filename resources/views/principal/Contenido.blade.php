@extends ('Principal') 
@section ('Contenido')

<template v-if="menu==0">
  <example-component></example-component> 
</template>

<!--Aqui va el contenido del menu de roles-->
<template v-if="menu==1">
 <rolcomponent></rolcomponent>
</template>

<template v-if="menu==2">
 <personascomponent></personascomponent>
</template>

<template v-if="menu==3">
  <h1>
                                      menu3
  </h1> 
</template>

<template v-if="menu==4">
 <categoriascomponent></categoriascomponent>
</template>

<template v-if="menu==5">
  <h1>
    menu5
  </h1> 
</template>

<template v-if="menu==6">
  <h1>
    menu6
  </h1> 
</template>

<template v-if="menu==7">
  <h1>
    menu7
  </h1> 
</template>

<template v-if="menu==8">
  <h1>
    menu8
  </h1> 
</template>
@endsection