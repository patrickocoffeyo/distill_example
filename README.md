#Distill Example
Drupal module that defines an example implementation of the [Distill](https://github.com/patrickocoffeyo/distill) module.

#Installation
* Clone this repository into a Drupal installation under `sites/all/modules/distill_example`.
* Open up `sites/all/modules/distill_example/distill_example.module`.
* Within the `distill_example_page()` page callback, change the `$entity = node_load(1);` to load a node that exists within your Drupal installation.
* Update the `$distiller->setField()` function calls to set fields that are on your content type.
* Visit `http://yourdrupalinstallation.local/distill` to see how the distiller has formatted your node.