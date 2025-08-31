Estandar de código
Configurado y usado Laravel Pint como formateador de código. Puesto que estaba dando conflictos luego de 
varios intentos, decido crear una tarea para ello y no poner ningún formatter por defecto creando archivos
de configuración para VSCode en la carpeta .vscode. Asigno la misma tecla por defecto de formateador. Los archivos son:
task.json
{
  "version": "2.0.0",
  "tasks": [
    {
      "label": "Formatear con Pint",
      "type": "shell",
      "command": "./vendor/bin/pint",
      "group": "build",
      "presentation": {
        "reveal": "never",
        "panel": "shared"
      },
      "problemMatcher": []
    }
  ]
}
keybindings.json
[
  {
    "key": "alt+shift+f", 
    "command": "workbench.action.tasks.runTask",
    "args": "Formatear con Pint"
  }
]
y settings.json
{  
  "[php]": {
    "editor.defaultFormatter": null
  },    
}
además en la raiz el pint.json
{
    "preset": "laravel"
}
