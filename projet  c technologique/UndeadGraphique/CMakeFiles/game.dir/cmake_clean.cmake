file(REMOVE_RECURSE
  "libgame.pdb"
  "libgame.a"
)

# Per-language clean rules from dependency scanning.
foreach(lang )
  include(CMakeFiles/game.dir/cmake_clean_${lang}.cmake OPTIONAL)
endforeach()
