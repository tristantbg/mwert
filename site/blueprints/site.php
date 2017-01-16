<?php if(!defined('KIRBY')) exit ?>

title: Site
fields:
  introSettings:
    label: Intro Settings
    type: headline
  intro:
    label: Intro
    type: structure
    style: table
    fields:
      introback:
        label: Image Back
        type: image
        width: 1/2
      introfront:
        label: Image Front
        type: image
        width: 1/2
      imagemotion:
        label: Image motion
        type: toggle
        options: yes/no
        width: 1/2
      colorsmotion:
        label: Colors motion
        type: toggle
        options: yes/no
        width: 1/2
      distort:
        label: Image stretch
        type: toggle
        options: yes/no
        width: 1/2
      effect:
        label: Fusion Effect
        type: select
        width: 1/2
        options:
          difference : Difference
          exclusion : Exclusion
          multiply : Multiply
  generalSettings:
    label: Site Settings
    type: headline
  title:
    label: Title
    type:  text
  description:
    label: Description
    type:  textarea
  keywords:
    label: Keywords
    type:  tags
  customcss:
    label: Custom CSS
    type: textarea
    buttons: false
  googleAnalytics:
    label: Google Analytics ID
    type: text
    icon: code
    help: Tracking ID in the form UA-XXXXXXXX-X. Keep this field empty if you are not using it.
    width: 1/2
  ogimage:
    label: Facebook OpenGraph image
    type: image
    help: 1200x630px minimum
    width: 1/2