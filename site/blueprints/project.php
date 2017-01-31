<?php if(!defined('KIRBY')) exit ?>

title: Project
pages: false
files: true
fields:
  prevnext: prevnext
  title:
    label: Title
    type:  text
    validate:
      maxLength: 45
    width: 1/2
  date:
    label: Year
    type:  date
    format: YYYY
    width: 1/2
    required: true
  featuredimage:
    label: Featured image
    type: image
    width: 1/2
    help: Required to display project
  secondaryimage:
    label: Secondary image
    type: image
    width: 1/4
    help: Optional
  fitheight:
    label: Fit height ?
    type: toggle
    width: 1/4
    default: no
  subtitle:
    label: Description Subtitle
    type:  text
  text:
    label: Description
    type: textarea
  sections:
    label: Sections
    type: builder
    fieldsets:
      imagesection:
        label: Image
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:20%">Image</td>
               <td>Width</td>
               <td>Position</td>
               <td>Caption Left</td>
               <td>Caption Right</td>
               </tr>
               <tr>
               <td style="width:20%"><img src="{{_thumb}}" width="80px"><br>{{content}}</td>
               <td>{{width}}</td>
               <td>{{position}}</td>
               <td>{{captionleft}}</td>
               <td>{{captionright}}</td>
               </tr>
               </table>
        fields:
          content:
            label: Image
            type: image
            required: true
            width: 1/2
          width:
            label: Width
            type: select
            width: 1/2
            required: true
            options:
              col-1-4 : 1/4
              col-2-4 : 2/4
              col-3-4 : 3/4
              col-4-4 : 4/4
            default: col-2-4
          position:
            label: Position
            type: select
            width: 1/2
            required: true
            options:
              left : Left
              center : Center
              right : Right
            default: center
          shadow:
            label: Shadow
            type: toggle
            options: yes/no
            default: no
            width: 1/2
          captionleft:
            label: Caption Left
            type: text
            width: 1/2
          captionright:
            label: Caption Right
            type: text
            width: 1/2
      textsection:
        label: Text
        snippet: sections/textsection
        fields:
          textcontent:
            label: Text
            type: textarea
      imagetextsection:
        label: Image & Text
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:20%">Image</td>
               <td>Caption Left</td>
               <td>Caption Right</td>
               <td>Text</td>
               <td>Text position</td>
               </tr>
               <tr>
               <td style="width:20%"><img src="{{_thumb}}" width="80px"><br>{{content}}</td>
               <td>{{captionleft}}</td>
               <td>{{captionright}}</td>
               <td>{{textcontent}}</td>
               <td>{{position}}</td>
               </tr>
               </table>
        fields:
          content:
            label: Image
            type: image
            required: true
            width: 1/2
          position:
            label: Text position
            type: select
            width: 1/2
            required: true
            options:
              left : Left
              right : Right
            default: left
          shadow:
            label: Shadow
            type: toggle
            options: yes/no
            default: no
          captionleft:
            label: Caption Left
            type: text
            width: 1/2
          captionright:
            label: Caption Right
            type: text
            width: 1/2
            help: Fill caption left first
          textcontent:
            label: Text
            type: textarea
      twoimages:
        label: Two images
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:20%">Image 1</td>
               <td>Caption Left</td>
               <td>Caption Right</td>
               <td style="width:20%">Image 2</td>
               <td>Caption Left</td>
               <td>Caption Right</td>
               </tr>
               <tr>
               <td style="width:20%"><img src="{{_thumb1}}" width="80px"><br>{{content1}}</td>
               <td>{{captionleft1}}</td>
               <td>{{captionright1}}</td>
               <td style="width:20%"><img src="{{_thumb2}}" width="80px"><br>{{content2}}</td>
               <td>{{captionleft2}}</td>
               <td>{{captionright2}}</td>
               </tr>
               </table>
        fields:
          content1:
            label: Image 1
            type: image
            required: true
            width: 1/2
          shadow1:
            label: Shadow 1
            type: toggle
            options: yes/no
            default: no
            width: 1/2
          captionleft1:
            label: Caption Left
            type: text
            width: 1/2
          captionright1:
            label: Caption Right
            type: text
            width: 1/2
            help: Fill caption left first
          content2:
            label: Image 2
            type: image
            required: true
          shadow2:
            label: Shadow 2
            type: toggle
            options: yes/no
            default: no
          captionleft2:
            label: Caption Left
            type: text
            width: 1/2
          captionright2:
            label: Caption Right
            type: text
            width: 1/2
            help: Fill caption left first