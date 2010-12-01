format 74

classcanvas 128898 class_ref 128514 // Command
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  color yellow
  xyz 78.706 1.89546 2000
end
note 139650 "MEMENTO"
  color white  xyzwh 3.4538 520.334 2000 88 34
note 139778 "Originator"
  color white  xyzwh 38.3757 404.24 2019 77 34
note 140034 "Originator"
  color white  xyzwh 567.988 3.079 3010 77 34
classcanvas 140290 class_ref 128770 // Memento
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  color blue
  xyz 325.851 713.698 2000
end
classcanvas 140418 class_ref 136578 // Caretaker
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  color mediumblue
  xyz 286.704 443.618 2000
end
classcanvas 143874 class_ref 136706 // ConcreteMementoInsert
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  color lightmediumblue
  xyz 89.6362 747.348 2000
end
classcanvas 154114 class_ref 156674 // ConcreteMementoBuffer
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  color lightmediumblue
  xyz 610.9 705.1 2000
end
classcanvas 154242 class_ref 128002 // Buffer
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  xyzwh 615.74 -5.58 3005 227 533
end
classcanvas 155650 class_ref 156802 // Undo
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  xyz 2.8 131.16 2000
end
classcanvas 155906 class_ref 156930 // do
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  xyzwh 160.32 128.62 2000 195 71
end
classcanvas 156546 class_ref 150146 // Replay
  draw_all_relations default hide_attributes default hide_operations default hide_getset_operations default show_members_full_definition default show_members_visibility default show_members_stereotype default show_members_context default show_members_multiplicity default show_members_initialization default show_attribute_modifiers default member_max_width 0 show_parameter_dir default show_parameter_name default package_name_in_tab default class_drawing_mode default drawing_language default show_context_mode default auto_label_position default show_relation_modifiers default show_relation_visibility default show_infonote default shadow default show_stereotype_properties default
  xyz 404.6 128.28 2006
end
relationcanvas 140546 relation_ref 137474 // <association>
  from ref 140290 z 2001 to ref 140418
  no_role_a no_role_b
  multiplicity_a_pos 350 565 3000 multiplicity_b_pos 352 693 3000
end
relationcanvas 152962 relation_ref 152322 // <realization>
  from ref 143874 z 2001 to ref 140290
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 154754 relation_ref 152450 // <association>
  decenter_end 661
  from ref 140418 z 3006 to ref 154242
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 154882 relation_ref 152578 // <realization>
  from ref 154114 z 2001 to ref 140290
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 155394 relation_ref 152962 // <unidirectional association>
  decenter_begin 303
  decenter_end 187
  from ref 154114 z 3006 to ref 154242
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 156034 relation_ref 153090 // <realization>
  from ref 155650 z 2001 to ref 128898
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 156162 relation_ref 153218 // <realization>
  from ref 155906 z 2001 to ref 128898
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 156674 relation_ref 153602 // <realization>
  from ref 156546 z 2007 to ref 128898
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 156930 relation_ref 153858 // <unidirectional association>
  from ref 156546 z 2007 to ref 140418
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 157058 relation_ref 153986 // <unidirectional association>
  from ref 155906 z 2007 to ref 156546
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
relationcanvas 157186 relation_ref 154114 // <unidirectional association>
  from ref 155650 z 2007 to point 66 211
  line 157314 z 2007 to ref 156546
  no_role_a no_role_b
  no_multiplicity_a no_multiplicity_b
end
line 142466 -_-_
  from ref 139650 z 2020 to ref 139778
end
