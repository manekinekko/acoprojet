format 74

classinstance 128002 class_ref 129154 // Ihm
  name ""   xyz 108 4 2000 life_line_z 2010
classinstance 128130 class_ref 128002 // Buffer
  name ""   xyz 557 4 2000 life_line_z 2010
classinstance 128258 class_ref 129282 // Insert
  name ""   xyz 328 4 2000 life_line_z 2010
note 130434 "Observer"
  xyzwh 54 188 2000 619 61
note 130562 "Command"
  color yellow  xyzwh 35 46 0 643 229
classinstance 130690 class_ref 128386 // Clipboard
  name ""   xyz 772 4 2000 life_line_z 2000
durationcanvas 128386 classinstance_ref 128002 // :Ihm
  color mediumyellow
  xyzwh 127 55 2020 11 212
  overlappingdurationcanvas 129666
    color lightmediumblue
    xyzwh 133 219 2025 11 25
  end
end
durationcanvas 128514 classinstance_ref 128258 // :Insert
  color mediumyellow
  xyzwh 347 61 2020 11 93
end
durationcanvas 129154 classinstance_ref 128130 // :Buffer
  color mediumyellow
  xyzwh 576 137 2020 11 109
  overlappingdurationcanvas 129410
    color lightmediumblue
    xyzwh 582 193 2025 11 41
  end
  overlappingdurationcanvas 130818
    xyzwh 582 149 2030 11 34
  end
end
durationcanvas 131074 classinstance_ref 130690 // :Clipboard
  xyzwh 801 163 2010 11 27
end
msg 128642 synchronous
  from durationcanvas_ref 128386
  to durationcanvas_ref 128514
  yz 63 2015 explicitmsg "execute()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 219 47
msg 129282 synchronous
  from durationcanvas_ref 128514
  to durationcanvas_ref 129154
  yz 138 2030 msg operation_ref 129538 // "cutText() : void"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 428 122
reflexivemsg 129538 asynchronous
  to durationcanvas_ref 129410
  yz 194 2030 msg operation_ref 130050 // "notify() : void"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 616 189
msg 129794 asynchronous
  from durationcanvas_ref 129410
  to durationcanvas_ref 129666
  yz 219 2030 explicitmsg "update(this)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 269 209
reflexivemsg 130946 asynchronous
  to durationcanvas_ref 130818
  yz 150 2035 explicitmsg "update the text attribut"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 594 133
msg 131202 asynchronous
  from durationcanvas_ref 130818
  to durationcanvas_ref 131074
  yz 164 2035 explicitmsg "setText(this->text)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 682 152
end
