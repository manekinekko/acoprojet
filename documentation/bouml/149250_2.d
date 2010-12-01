format 74

classinstance 128258 class_ref 129154 // Ihm
  name ""   xyz 70.5812 3.6 2005 life_line_z 2010
classinstance 128386 class_ref 150146 // Replay
  name ""   xyz 144.728 3.6 2005 life_line_z 2010
classinstance 128514 class_ref 136578 // Caretaker
  name ""   xyz 268.254 2.76472 2005 life_line_z 2010
classinstance 128642 class_ref 136066 // InsertSave
  name ""   xyz 668.037 4.6 2005 life_line_z 2010
classinstance 129666 class_ref 129282 // Insert
  name "ins"   xyz 500.31 464.236 2005 life_line_z 2010
classinstance 131842 class_ref 136706 // ConcreteMementoInsert
  name "m"   xyz 312.439 110.307 2015 life_line_z 2010
classinstance 131970 class_ref 128002 // Buffer
  name "b"   xyz 578.599 316.7 3005 life_line_z 2010
note 138882 "Obserer
"
  xyzwh 24.7 531.6 2000 671 129
note 139010 "Memento
"
  color gold  xyzwh 17 48.1 0 721 626
durationcanvas 128770 classinstance_ref 128258 // :Ihm
  xyzwh 89 63.75 2015 11 604
  overlappingdurationcanvas 137986
    xyzwh 95 550.9 2030 11 32
  end
end
durationcanvas 128898 classinstance_ref 128386 // :Replay
  xyzwh 165 63.7 2015 11 591
end
durationcanvas 129154 classinstance_ref 128514 // :Caretaker
  xyzwh 297 87.95 2015 11 52
end
durationcanvas 132226 classinstance_ref 131842 // m:ConcreteMementoInsert
  xyzwh 385 183.2 2020 11 452
end
durationcanvas 135042 classinstance_ref 128642 // :InsertSave
  xyzwh 700 206.7 2020 11 264
  overlappingdurationcanvas 135682
    xyzwh 706 240.35 2025 11 220
    overlappingdurationcanvas 136834
      xyzwh 712 401.75 2030 11 48
    end
  end
end
durationcanvas 136194 classinstance_ref 131970 // b:Buffer
  xyzwh 600 367.8 2015 11 251
  overlappingdurationcanvas 137474
    xyzwh 606 517.6 2030 11 95
    overlappingdurationcanvas 137730
      xyzwh 612 542.95 2035 11 63
    end
  end
end
durationcanvas 137218 classinstance_ref 129666 // ins:Insert
  xyzwh 526 511.15 2015 11 101
end
msg 129026 synchronous
  from durationcanvas_ref 128770
  to durationcanvas_ref 128898
  yz 67 2015 explicitmsg "execute()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 108 51
msg 129282 synchronous
  from durationcanvas_ref 128898
  to durationcanvas_ref 129154
  yz 93 2020 explicitmsg "getMemento(index)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 185 76
msg 132098 return
  from durationcanvas_ref 129154
  to durationcanvas_ref 128898
  yz 120 2020 explicitmsg "m"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 239 103
msg 132354 synchronous
  from durationcanvas_ref 128898
  to durationcanvas_ref 132226
  yz 191 2020 explicitmsg "redo()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 223 171
msg 135170 synchronous
  from durationcanvas_ref 132226
  to durationcanvas_ref 135042
  yz 213 2025 explicitmsg "setMemento(m)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 412 196
msg 135810 synchronous
  from durationcanvas_ref 132226
  to durationcanvas_ref 135682
  yz 271 3005 explicitmsg "getReceiver()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 422 254
msg 135938 return
  from durationcanvas_ref 135042
  to durationcanvas_ref 132226
  yz 226 3005 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 136066 return
  from durationcanvas_ref 135682
  to durationcanvas_ref 132226
  yz 300 2025 explicitmsg "b"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 456 283
msg 136322 synchronous
  from durationcanvas_ref 132226
  to durationcanvas_ref 136194
  yz 367 2025 explicitmsg "setSelection(start, end)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 399 350
msg 136450 return
  from durationcanvas_ref 136194
  to durationcanvas_ref 132226
  yz 378 2015 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 136962 synchronous
  from durationcanvas_ref 132226
  to durationcanvas_ref 136834
  yz 408 2035 explicitmsg "getCommand()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 468 391
msg 137090 return
  from durationcanvas_ref 136834
  to durationcanvas_ref 132226
  yz 430 2040 explicitmsg "ins"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 544 414
msg 137346 synchronous
  from durationcanvas_ref 132226
  to durationcanvas_ref 137218
  yz 511 2015 msg operation_ref 134914 // "execute() : void"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 434 495
msg 137602 synchronous
  from durationcanvas_ref 137218
  to durationcanvas_ref 137474
  yz 518 2025 explicitmsg "insert(c)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 545 503
reflexivemsg 137858 synchronous
  to durationcanvas_ref 137730
  yz 542 2040 msg operation_ref 130050 // "notify() : void"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 645 541
msg 138114 synchronous
  from durationcanvas_ref 137730
  to durationcanvas_ref 137986
  yz 557 2040 msg operation_ref 134658 // "update(inout s : )"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 225 542
msg 138242 return
  from durationcanvas_ref 137730
  to durationcanvas_ref 137218
  yz 589 2040 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 138370 return
  from durationcanvas_ref 137218
  to durationcanvas_ref 132226
  yz 599 2020 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 138498 return
  from durationcanvas_ref 132226
  to durationcanvas_ref 128898
  yz 624 2020 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 138626 return
  from durationcanvas_ref 128898
  to durationcanvas_ref 128770
  yz 644 2020 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 138754 return
  from durationcanvas_ref 137986
  to durationcanvas_ref 137730
  yz 565 2045 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
end
