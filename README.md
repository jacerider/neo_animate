```twig
<article{{ attributes.addClass(classes)|neo_animate_attribute('zoom-in', {delay: 200}) }}>
```

```twig
 {{ content.field_images|neo_animate_children('zoom-out', 2) }}
 ```
