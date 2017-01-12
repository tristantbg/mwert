<?php if(!defined('KIRBY')) exit ?>

title: About
pages: true
files: true
fields:
  titleSettings:
    label: About Settings
    type: headline
  title:
    label: Title
    type:  text
  text:
    label: Description
    type: textarea
  contact:
    label: Contact
    type: textarea
  sections:
    label: Sections
    type: builder
    fieldsets:
      aboutsection:
        label: About Section
        snippet: sections/aboutsection
        fields:
          sectiontitle:
            label: Section title
            type: text
          textcontent:
            label: Text
            type: textarea
