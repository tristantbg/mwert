<?php if(!defined('KIRBY')) exit ?>

title: Pages folder
pages:
  template:
    - project
files: true
fields:
  titleSettings:
    label: Home Settings
    type: headline
  title:
    label: Title
    type:  text
  globalorder:
    label: Global order
    type: structure
    style: table
    fields:
      project:
        label: Project
        type: quickselect
        options: query
        sort: asc
        query:
          page: /
          fetch: index
          template: project
          text: '{{title}} ({{uri}})'
          value: '{{uri}}'
        placeholder: Choose a project...
        required: true
      featuredimage:
        label: Custom Featured image
        type: quickselect
        options: images
        help: Optional
      secondaryimage:
        label: Custom Secondary image
        type: quickselect
        options: images
        help: Optional
