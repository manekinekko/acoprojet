format 74

classinstance 128258 class_ref 129154 // Ihm
  name ""   xyz 70.8312 4 2005 life_line_z 2010
classinstance 128386 class_ref 150146 // Replay
  name ""   xyz 641.228 4 2005 life_line_z 2010
classinstance 139138 class_ref 156930 // Do
  name ""   xyz 311 4 2000 life_line_z 2000
durationcanvas 128770 classinstance_ref 128258 // :Ihm
  xyzwh 89 56 2015 11 123
end
durationcanvas 128898 classinstance_ref 128386 // :Replay
  xyzwh 662 77 2015 11 96
  overlappingdurationcanvas 141186
    xyzwh 668 140 2025 11 26
  end
end
durationcanvas 139266 classinstance_ref 139138 // :Do
  xyzwh 330 67 2010 11 101
end
msg 139394 synchronous
  from durationcanvas_ref 128770
  to durationcanvas_ref 139266
  yz 67 2020 msg operation_ref 152578 // "execute()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 135 51
msg 141314 synchronous
  from durationcanvas_ref 139266
  to durationcanvas_ref 141186
  yz 140 2030 msg operation_ref 153730 // "execute()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 477 124
end
