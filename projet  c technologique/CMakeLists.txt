cmake_minimum_required(VERSION 2.6)
#NOM DU PROJET
project(undead_solve)

set(CMAKE_C_COMPILER gcov)
set(CMAKE_C_COMPILER gcc)
set(CMAKE_C_FLAGS "-std=c99 -g -Wall")
 set(HEADERS
          game.h
           game_io.h
         )
   set(SRCS

          solver.c

         )
option(ENABLE_DEBUG "debug options" ON)
if(ENABLE_DEBUG)
set(CMAKE_C_FLAGS "-std=c99 -g -fprofile-arcs -ftest-coverage -Wall")
set(CMAKE_LD_FLAGS "-fprofile-arcs -ftest-coverage")
else()
set(CMAKE_C_FLAGS "-std=c99 -O3 -Wall")
endif()
#LES EXECUTABLES
add_library(game game.c game_io.c )
SET_TARGET_PROPERTIES(game PROPERTIES LINKER_LANGUAGE C)
add_executable(testAM testAM.c game.c  game_io.c)
add_executable(foo foo.c game.c  game_io.c)
add_executable(undead_solve solver.c game.c game_io.c)
add_executable(testSAM testSAM.c game.c game_io.c)
add_executable(testSEY testSEY.c game.c game_io.c)
add_executable(test_DIAK test_DIAK.c game.c game_io.c)
add_executable(test_Solver testSolver.c solver.c game.c game_io.c )

target_link_libraries(testAM game)
target_link_libraries(testSAM game)
target_link_libraries(testSEY game)
target_link_libraries(test_DIAK game)
target_link_libraries(undead_solve game)
target_link_libraries(test_Solver game)

enable_testing()
include(CTest)

add_test(test1 ./testAM)
add_test(test2 ./testSAM)
add_test(test3 ./testSEY)
add_test(test4 ./test_DIAK)
add_test(test4 ./test_Solver)

cmake_minimum_required(VERSION 2.6)
