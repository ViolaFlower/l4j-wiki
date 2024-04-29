**Here you will see about modifying/creating the JSON files of the listings used in the mod, such as crafting_tab_listing.json, creative_tab_listing.json or even stonecutting_groups.json**


# General Concept
**The listings for this mod are generally made to facilitate the addition of resources to interfaces, which clearly do not affect the server-side directly, through resource packs, without the need to modify something as simple as that in code, allowing mods to make their own changes to the Legacy4J interface.**

If the listing is in a tab, its icon will can be either a GUI [sprite](https://minecraft.wiki/w/Resource_pack) or an item id, being mandatory if you are wanting to add a tab. And if it's an item, it can have a nbt, formatted as in the game commands.

--> (*explanation) = JSON Entry Note

## Creative Tab Listing
**Basically, this uses item listing when adding/modifying Legacy Creative Interface tabs, which is its main function. It's defined by the JSON file named "creative_tab_listing.json" in the assets directory of the desired namespace.**

As usual, I will use a JSON file as an example, in this case part of [legacy:creative_tab_listing.json](https://github.com/Wilyicaro/Legacy-Minecraft/blob/master/common/src/main/resources/assets/legacy/creative_tab_listing.json) to make it easier to understand.

    {
      "legacy.container.tab.building_blocks": {
        "icon" :"legacy:icon/structures",
        "listing" --> (its value is an array of item ids, which can contain an nbt as well as the icon if it is an object that has the id in the "item" key and the nbt in the "nbt" key, you can see this in the rest of the file) : [
        "minecraft:stone", "minecraft:deepslate", "minecraft:basalt", "minecraft:blackstone", "minecraft:grass_block", "minecraft:dirt_path", "minecraft:dirt", "minecraft:cobblestone", "minecraft:cobbled_deepslate", "minecraft:smooth_stone"
        ]
      }
    }

As you can see, the key of the object is the [translatable](https://minecraft.fandom.com/wiki/Resource_pack#Language) component key that the Creative Interface displays when this tab is selected

## Recipe Value Concept
Before we proceed, it's essential to understand the principle of the posterior listings, which are the recipe values.

Basically, they're used to refer to recipes, either by an id of a specific recipe, like "black_stained_glass_pane_from_glass_pane", or by an item or block tag (needs to have the format "#namespace:block/path") that references all recipes that the result matches this tag, if it starts with "#".

## Crafting Tab Listing
**Basically, this uses recipe values listing when adding/modifying Crafting Interface tabs, which is its main function. It's defined by the JSON file named "crafting_tab_listing.json" in the assets directory of the desired namespace.**

The Crafting Tabs, unlike Creative's, have groups for each listing, which the name is only used to identify, and you can use the defined name to add recipe values to specific groups in the default file, without copying it all, through from other namespaces. If the group key name is empty, each recipe value will have its own group based on its id (with namespace), the same is valid if the groups array has recipe values instead of objects with the group and a recipe values array.

As usual, I will use a JSON file as an example, in this case part of [legacy:crafting_tab_listing.json](https://github.com/Wilyicaro/Legacy-Minecraft/blob/master/common/src/main/resources/assets/legacy/crafting_tab_listing.json) to make it easier to understand.

    {
        "transport" --> (the name of the tab, used only to identify) : {
        "icon": "legacy:icon/transport",
        "displayName": "legacy.container.tab.transport",
        "listing" --> (its value can be either an object or an array with objects, where the group of recipes is defined by the value of the "group" key, and the recipes by "recipes", this can be seen in the rest of the file) : {
          "rail": ["rail","powered_rail","detector_rail","activator_rail"],
          "": ["minecart","chest_minecart","furnace_minecart","tnt_minecart","hopper_minecart"],
          "boat": ["oak_boat","birch_boat","spruce_boat","jungle_boat","acacia_boat","dark_oak_boat","mangrove_boat","bamboo_raft","cherry_boat"],
          "chest_boat": ["oak_chest_boat","birch_chest_boat","spruce_chest_boat","jungle_chest_boat","acacia_chest_boat","dark_oak_chest_boat","mangrove_chest_boat","bamboo_chest_raft","cherry_chest_boat"]
        }
    }

As you can see, the key "displayName" is the [translatable](https://minecraft.fandom.com/wiki/Resource_pack#Language) component key that the Crafting Interface displays when this tab is selected

## Stonecutting Groups
**The most simplistic of all, it's defined by the JSON file namespace:stonecutting_groups.json and only presents groups of recipe values, which work as in the Crafting Tab Listing.**

It only presents groups in the "groups" key, which must be an object, unlike Crafting Tab Listing, which can be an array. Another difference is that as there are no tabs, recipes will not be repeated between groups to make the view more compact.  

You can use the default file [legacy:stone_cutting_groups.json](https://github.com/Wilyicaro/Legacy-Minecraft/blob/master/common/src/main/resources/assets/legacy/stone_cutting_groups.json) as an example