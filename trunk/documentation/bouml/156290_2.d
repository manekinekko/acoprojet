format 74

classinstance 128386 class_ref 136578 // Caretaker
 color mediumgreen  name "caretaker"   xyz 853.8 4 2000 life_line_z 2010
note 128770 "Observer"
  xyzwh 74.7 619.9 2010 437 93
classinstance 129026 class_ref 128002 // Buffer
  name ""   xyz 187.7 5 2000 life_line_z 2000
classinstance 131586 class_ref 136706 // ConcreteMementoInsert
 color mediumgreen  name "m"   xyz 740.2 409 2010 life_line_z 2010
classinstance 138882 class_ref 129282 // Insert
  name "insert"   xyz 464 4 2005 life_line_z 2000
classinstance 139522 class_ref 129154 // Ihm
  name ""   xyz 68 4 2005 life_line_z 1995
classinstance 140034 class_ref 136066 // InsertSave
  name "insertSave"   xyz 567 4 2025 life_line_z 2000
classinstance 146306 class_ref 156674 // ConcreteMementoBuffer
 color mediumgreen  name "b"   xyz 263 233 2005 life_line_z 2000
note 146690 "Memento"
  color green  xyzwh 7.5 94.5 1995 991 471
note 146818 "Case : cartaker.index%10==0"
  color lightorange  xyzwh 11 197 1995 969 181
durationcanvas 140802 classinstance_ref 139522 // :Ihm
  xyzwh 87 68 1995 11 605
end
durationcanvas 140930 classinstance_ref 140034 // insertSave:InsertSave
  xyzwh 627 69 2010 11 612
  overlappingdurationcanvas 145410
    xyzwh 633 395 2020 11 153
  end
end
durationcanvas 142210 classinstance_ref 138882 // insert:Insert
  xyzwh 496 571 2010 11 143
end
durationcanvas 145154 classinstance_ref 128386 // caretaker:Caretaker
  xyzwh 907 136 2040 11 419
  overlappingdurationcanvas 148354
    xyzwh 913 347 2050 11 25
  end
  overlappingdurationcanvas 148610
    xyzwh 913 524 2050 11 25
  end
  overlappingdurationcanvas 148866
    xyzwh 913 162 2050 11 25
  end
end
durationcanvas 145666 classinstance_ref 131586 // m:ConcreteMementoInsert
  xyzwh 812 461 2020 11 34
end
durationcanvas 146946 classinstance_ref 129026 // :Buffer
  xyzwh 206 217 2010 11 120
end
durationcanvas 147458 classinstance_ref 146306 // b:ConcreteMementoBuffer
  xyzwh 335 286 2010 11 30
end
msg 141058 asynchronous
  from durationcanvas_ref 140802
  to durationcanvas_ref 140930
  yz 69 2025 msg operation_ref 142594 // "execute()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 547 57
msg 142338 synchronous
  from durationcanvas_ref 140930
  to durationcanvas_ref 142210
  yz 579 2030 msg operation_ref 134914 // "execute() : void"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 554 563
msg 145282 synchronous
  from durationcanvas_ref 140930
  to durationcanvas_ref 145154
  yz 136 3005 explicitmsg "save(insertSave)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 652 125
msg 145538 synchronous
  from durationcanvas_ref 145154
  to durationcanvas_ref 145410
  yz 395 2025 explicitmsg "getMemento()"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 651 381
msg 145794 synchronous
  from durationcanvas_ref 145410
  to durationcanvas_ref 145666
  yz 462 2025 explicitmsg "new"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 704 453
msg 145922 return
  from durationcanvas_ref 145666
  to durationcanvas_ref 145410
  yz 478 2030 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 147074 synchronous
  from durationcanvas_ref 145154
  to durationcanvas_ref 146946
  yz 217 2045 msg operation_ref 151810 // "getMemento() : Memento"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 232 205
msg 147586 synchronous
  from durationcanvas_ref 146946
  to durationcanvas_ref 147458
  yz 287 2015 explicitmsg "new"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 263 271
msg 147714 return
  from durationcanvas_ref 147458
  to durationcanvas_ref 146946
  yz 305 2015 unspecifiedmsg
  show_full_operations_definition default drawing_language default show_context_mode default
msg 147842 return
  from durationcanvas_ref 145410
  to durationcanvas_ref 145154
  yz 511 2045 explicitmsg "m"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 769 495
msg 147970 return
  from durationcanvas_ref 146946
  to durationcanvas_ref 145154
  yz 326 3005 explicitmsg "b"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 886 311
reflexivemsg 148482 synchronous
  to durationcanvas_ref 148354
  yz 347 2055 explicitmsg "save(b)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 911 331
reflexivemsg 148738 synchronous
  to durationcanvas_ref 148610
  yz 524 2055 explicitmsg "save(m)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 910 508
reflexivemsg 148994 synchronous
  to durationcanvas_ref 148866
  yz 162 2055 explicitmsg "pointer++; setIndex(pointer)"
  show_full_operations_definition default drawing_language default show_context_mode default
  label_xy 944 161
end
