**You didn't read the title wrong, you can create world templates, like the Tutorial world, just with resource packs in this mod.**  
That's why on this page I'll explain it with the world_templates.json file that comes in the mod by default to make it easier to understand

***

Add more entries to the JSON following the example below, or you can create the "world_templates.json" file in other namespaces (directories in assets, such as "minecraft").

--> (*explanation) = JSON Entry Note

{  
   "legacy.menu.play_tutorial" --> ([translatable](https://minecraft.fandom.com/wiki/Resource_pack#Language) component key used in button name): {  
     "icon" --> (location of the button icon sprite, note that sprites are basically textures in the [namespace:textures/gui/sprites](https://minecraft.wiki/w/Resource_pack) directory): "legacy:creation_list/tutorial",  
     "templateLocation" --> (world file in .zip or .mcsave, which are the same format): "legacy:tutorial/tutorial.mcsave",  
     "folderName" --> (name of the template world directory when created): "Tutorial",  
     "directJoin" --> (if true, ignores the Load Save screen and enters the world directly, as in the tutorial): true  
   }