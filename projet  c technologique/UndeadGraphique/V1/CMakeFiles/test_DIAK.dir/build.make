# CMAKE generated file: DO NOT EDIT!
# Generated by "Unix Makefiles" Generator, CMake Version 3.7

# Delete rule output on recipe failure.
.DELETE_ON_ERROR:


#=============================================================================
# Special targets provided by cmake.

# Disable implicit rules so canonical targets will work.
.SUFFIXES:


# Remove some rules from gmake that .SUFFIXES does not remove.
SUFFIXES =

.SUFFIXES: .hpux_make_needs_suffix_list


# Suppress display of executed commands.
$(VERBOSE).SILENT:


# A target that is always out of date.
cmake_force:

.PHONY : cmake_force

#=============================================================================
# Set environment variables for the build.

# The shell in which to execute make rules.
SHELL = /bin/sh

# The CMake executable.
CMAKE_COMMAND = /usr/bin/cmake

# The command to remove a file.
RM = /usr/bin/cmake -E remove -f

# Escaping for special characters.
EQUALS = =

# The top-level source directory on which CMake was run.
CMAKE_SOURCE_DIR = "/net/cremi/thdiallo/projet  c technologique/V1"

# The top-level build directory on which CMake was run.
CMAKE_BINARY_DIR = "/net/cremi/thdiallo/projet  c technologique/V1"

# Include any dependencies generated for this target.
include CMakeFiles/test_DIAK.dir/depend.make

# Include the progress variables for this target.
include CMakeFiles/test_DIAK.dir/progress.make

# Include the compile flags for this target's objects.
include CMakeFiles/test_DIAK.dir/flags.make

CMakeFiles/test_DIAK.dir/test_DIAK.c.o: CMakeFiles/test_DIAK.dir/flags.make
CMakeFiles/test_DIAK.dir/test_DIAK.c.o: test_DIAK.c
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_1) "Building C object CMakeFiles/test_DIAK.dir/test_DIAK.c.o"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -o CMakeFiles/test_DIAK.dir/test_DIAK.c.o   -c "/net/cremi/thdiallo/projet  c technologique/V1/test_DIAK.c"

CMakeFiles/test_DIAK.dir/test_DIAK.c.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing C source to CMakeFiles/test_DIAK.dir/test_DIAK.c.i"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -E "/net/cremi/thdiallo/projet  c technologique/V1/test_DIAK.c" > CMakeFiles/test_DIAK.dir/test_DIAK.c.i

CMakeFiles/test_DIAK.dir/test_DIAK.c.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling C source to assembly CMakeFiles/test_DIAK.dir/test_DIAK.c.s"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -S "/net/cremi/thdiallo/projet  c technologique/V1/test_DIAK.c" -o CMakeFiles/test_DIAK.dir/test_DIAK.c.s

CMakeFiles/test_DIAK.dir/test_DIAK.c.o.requires:

.PHONY : CMakeFiles/test_DIAK.dir/test_DIAK.c.o.requires

CMakeFiles/test_DIAK.dir/test_DIAK.c.o.provides: CMakeFiles/test_DIAK.dir/test_DIAK.c.o.requires
	$(MAKE) -f CMakeFiles/test_DIAK.dir/build.make CMakeFiles/test_DIAK.dir/test_DIAK.c.o.provides.build
.PHONY : CMakeFiles/test_DIAK.dir/test_DIAK.c.o.provides

CMakeFiles/test_DIAK.dir/test_DIAK.c.o.provides.build: CMakeFiles/test_DIAK.dir/test_DIAK.c.o


CMakeFiles/test_DIAK.dir/game.c.o: CMakeFiles/test_DIAK.dir/flags.make
CMakeFiles/test_DIAK.dir/game.c.o: game.c
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_2) "Building C object CMakeFiles/test_DIAK.dir/game.c.o"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -o CMakeFiles/test_DIAK.dir/game.c.o   -c "/net/cremi/thdiallo/projet  c technologique/V1/game.c"

CMakeFiles/test_DIAK.dir/game.c.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing C source to CMakeFiles/test_DIAK.dir/game.c.i"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -E "/net/cremi/thdiallo/projet  c technologique/V1/game.c" > CMakeFiles/test_DIAK.dir/game.c.i

CMakeFiles/test_DIAK.dir/game.c.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling C source to assembly CMakeFiles/test_DIAK.dir/game.c.s"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -S "/net/cremi/thdiallo/projet  c technologique/V1/game.c" -o CMakeFiles/test_DIAK.dir/game.c.s

CMakeFiles/test_DIAK.dir/game.c.o.requires:

.PHONY : CMakeFiles/test_DIAK.dir/game.c.o.requires

CMakeFiles/test_DIAK.dir/game.c.o.provides: CMakeFiles/test_DIAK.dir/game.c.o.requires
	$(MAKE) -f CMakeFiles/test_DIAK.dir/build.make CMakeFiles/test_DIAK.dir/game.c.o.provides.build
.PHONY : CMakeFiles/test_DIAK.dir/game.c.o.provides

CMakeFiles/test_DIAK.dir/game.c.o.provides.build: CMakeFiles/test_DIAK.dir/game.c.o


CMakeFiles/test_DIAK.dir/game_io.c.o: CMakeFiles/test_DIAK.dir/flags.make
CMakeFiles/test_DIAK.dir/game_io.c.o: game_io.c
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_3) "Building C object CMakeFiles/test_DIAK.dir/game_io.c.o"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -o CMakeFiles/test_DIAK.dir/game_io.c.o   -c "/net/cremi/thdiallo/projet  c technologique/V1/game_io.c"

CMakeFiles/test_DIAK.dir/game_io.c.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing C source to CMakeFiles/test_DIAK.dir/game_io.c.i"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -E "/net/cremi/thdiallo/projet  c technologique/V1/game_io.c" > CMakeFiles/test_DIAK.dir/game_io.c.i

CMakeFiles/test_DIAK.dir/game_io.c.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling C source to assembly CMakeFiles/test_DIAK.dir/game_io.c.s"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -S "/net/cremi/thdiallo/projet  c technologique/V1/game_io.c" -o CMakeFiles/test_DIAK.dir/game_io.c.s

CMakeFiles/test_DIAK.dir/game_io.c.o.requires:

.PHONY : CMakeFiles/test_DIAK.dir/game_io.c.o.requires

CMakeFiles/test_DIAK.dir/game_io.c.o.provides: CMakeFiles/test_DIAK.dir/game_io.c.o.requires
	$(MAKE) -f CMakeFiles/test_DIAK.dir/build.make CMakeFiles/test_DIAK.dir/game_io.c.o.provides.build
.PHONY : CMakeFiles/test_DIAK.dir/game_io.c.o.provides

CMakeFiles/test_DIAK.dir/game_io.c.o.provides.build: CMakeFiles/test_DIAK.dir/game_io.c.o


CMakeFiles/test_DIAK.dir/solver.c.o: CMakeFiles/test_DIAK.dir/flags.make
CMakeFiles/test_DIAK.dir/solver.c.o: solver.c
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_4) "Building C object CMakeFiles/test_DIAK.dir/solver.c.o"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -o CMakeFiles/test_DIAK.dir/solver.c.o   -c "/net/cremi/thdiallo/projet  c technologique/V1/solver.c"

CMakeFiles/test_DIAK.dir/solver.c.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing C source to CMakeFiles/test_DIAK.dir/solver.c.i"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -E "/net/cremi/thdiallo/projet  c technologique/V1/solver.c" > CMakeFiles/test_DIAK.dir/solver.c.i

CMakeFiles/test_DIAK.dir/solver.c.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling C source to assembly CMakeFiles/test_DIAK.dir/solver.c.s"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -S "/net/cremi/thdiallo/projet  c technologique/V1/solver.c" -o CMakeFiles/test_DIAK.dir/solver.c.s

CMakeFiles/test_DIAK.dir/solver.c.o.requires:

.PHONY : CMakeFiles/test_DIAK.dir/solver.c.o.requires

CMakeFiles/test_DIAK.dir/solver.c.o.provides: CMakeFiles/test_DIAK.dir/solver.c.o.requires
	$(MAKE) -f CMakeFiles/test_DIAK.dir/build.make CMakeFiles/test_DIAK.dir/solver.c.o.provides.build
.PHONY : CMakeFiles/test_DIAK.dir/solver.c.o.provides

CMakeFiles/test_DIAK.dir/solver.c.o.provides.build: CMakeFiles/test_DIAK.dir/solver.c.o


# Object files for target test_DIAK
test_DIAK_OBJECTS = \
"CMakeFiles/test_DIAK.dir/test_DIAK.c.o" \
"CMakeFiles/test_DIAK.dir/game.c.o" \
"CMakeFiles/test_DIAK.dir/game_io.c.o" \
"CMakeFiles/test_DIAK.dir/solver.c.o"

# External object files for target test_DIAK
test_DIAK_EXTERNAL_OBJECTS =

test_DIAK: CMakeFiles/test_DIAK.dir/test_DIAK.c.o
test_DIAK: CMakeFiles/test_DIAK.dir/game.c.o
test_DIAK: CMakeFiles/test_DIAK.dir/game_io.c.o
test_DIAK: CMakeFiles/test_DIAK.dir/solver.c.o
test_DIAK: CMakeFiles/test_DIAK.dir/build.make
test_DIAK: libgame.a
test_DIAK: CMakeFiles/test_DIAK.dir/link.txt
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --bold --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_5) "Linking C executable test_DIAK"
	$(CMAKE_COMMAND) -E cmake_link_script CMakeFiles/test_DIAK.dir/link.txt --verbose=$(VERBOSE)

# Rule to build all files generated by this target.
CMakeFiles/test_DIAK.dir/build: test_DIAK

.PHONY : CMakeFiles/test_DIAK.dir/build

CMakeFiles/test_DIAK.dir/requires: CMakeFiles/test_DIAK.dir/test_DIAK.c.o.requires
CMakeFiles/test_DIAK.dir/requires: CMakeFiles/test_DIAK.dir/game.c.o.requires
CMakeFiles/test_DIAK.dir/requires: CMakeFiles/test_DIAK.dir/game_io.c.o.requires
CMakeFiles/test_DIAK.dir/requires: CMakeFiles/test_DIAK.dir/solver.c.o.requires

.PHONY : CMakeFiles/test_DIAK.dir/requires

CMakeFiles/test_DIAK.dir/clean:
	$(CMAKE_COMMAND) -P CMakeFiles/test_DIAK.dir/cmake_clean.cmake
.PHONY : CMakeFiles/test_DIAK.dir/clean

CMakeFiles/test_DIAK.dir/depend:
	cd "/net/cremi/thdiallo/projet  c technologique/V1" && $(CMAKE_COMMAND) -E cmake_depends "Unix Makefiles" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles/test_DIAK.dir/DependInfo.cmake" --color=$(COLOR)
.PHONY : CMakeFiles/test_DIAK.dir/depend

