CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Twig


INTRODUCTION
------------

An animation manager and library for Neo utilizing the Animate on Scroll
library (https://github.com/michalsnik/aos).


REQUIREMENTS
------------

This module requires Drupal core and Neo.


INSTALLATION
------------

Install as you would normally install a contributed Drupal module. Visit
https://www.drupal.org/node/1897420 for further information.

TWIG
-----

Animate an attribute.

```twig
<article{{ attributes.addClass(classes)|neo_animate_attribute('zoom-in', {delay: 200}) }}>
```

Animate an element with children utilizing an delay of 200ms per every second
item. The first item will have a delay of 0, the second item will have a delay
of 200, the third item will have a delay of 0, and so on.

```twig
 {{ content.field_images|neo_animate_children('zoom-out', 2, 200) }}
 ```
