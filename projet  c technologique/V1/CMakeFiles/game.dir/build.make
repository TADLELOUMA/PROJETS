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
include CMakeFiles/game.dir/depend.make

# Include the progress variables for this target.
include CMakeFiles/game.dir/progress.make

# Include the compile flags for this target's objects.
include CMakeFiles/game.dir/flags.make

CMakeFiles/game.dir/game.c.o: CMakeFiles/game.dir/flags.make
CMakeFiles/game.dir/game.c.o: game.c
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_1) "Building C object CMakeFiles/game.dir/game.c.o"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -o CMakeFiles/game.dir/game.c.o   -c "/net/cremi/thdiallo/projet  c technologique/V1/game.c"

CMakeFiles/game.dir/game.c.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing C source to CMakeFiles/game.dir/game.c.i"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -E "/net/cremi/thdiallo/projet  c technologique/V1/game.c" > CMakeFiles/game.dir/game.c.i

CMakeFiles/game.dir/game.c.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling C source to assembly CMakeFiles/game.dir/game.c.s"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -S "/net/cremi/thdiallo/projet  c technologique/V1/game.c" -o CMakeFiles/game.dir/game.c.s

CMakeFiles/game.dir/game.c.o.requires:

.PHONY : CMakeFiles/game.dir/game.c.o.requires

CMakeFiles/game.dir/game.c.o.provides: CMakeFiles/game.dir/game.c.o.requires
	$(MAKE) -f CMakeFiles/game.dir/build.make CMakeFiles/game.dir/game.c.o.provides.build
.PHONY : CMakeFiles/game.dir/game.c.o.provides

CMakeFiles/game.dir/game.c.o.provides.build: CMakeFiles/game.dir/game.c.o


CMakeFiles/game.dir/game_io.c.o: CMakeFiles/game.dir/flags.make
CMakeFiles/game.dir/game_io.c.o: game_io.c
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_2) "Building C object CMakeFiles/game.dir/game_io.c.o"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -o CMakeFiles/game.dir/game_io.c.o   -c "/net/cremi/thdiallo/projet  c technologique/V1/game_io.c"

CMakeFiles/game.dir/game_io.c.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing C source to CMakeFiles/game.dir/game_io.c.i"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -E "/net/cremi/thdiallo/projet  c technologique/V1/game_io.c" > CMakeFiles/game.dir/game_io.c.i

CMakeFiles/game.dir/game_io.c.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling C source to assembly CMakeFiles/game.dir/game_io.c.s"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -S "/net/cremi/thdiallo/projet  c technologique/V1/game_io.c" -o CMakeFiles/game.dir/game_io.c.s

CMakeFiles/game.dir/game_io.c.o.requires:

.PHONY : CMakeFiles/game.dir/game_io.c.o.requires

CMakeFiles/game.dir/game_io.c.o.provides: CMakeFiles/game.dir/game_io.c.o.requires
	$(MAKE) -f CMakeFiles/game.dir/build.make CMakeFiles/game.dir/game_io.c.o.provides.build
.PHONY : CMakeFiles/game.dir/game_io.c.o.provides

CMakeFiles/game.dir/game_io.c.o.provides.build: CMakeFiles/game.dir/game_io.c.o


CMakeFiles/game.dir/solver.c.o: CMakeFiles/game.dir/flags.make
CMakeFiles/game.dir/solver.c.o: solver.c
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_3) "Building C object CMakeFiles/game.dir/solver.c.o"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -o CMakeFiles/game.dir/solver.c.o   -c "/net/cremi/thdiallo/projet  c technologique/V1/solver.c"

CMakeFiles/game.dir/solver.c.i: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Preprocessing C source to CMakeFiles/game.dir/solver.c.i"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -E "/net/cremi/thdiallo/projet  c technologique/V1/solver.c" > CMakeFiles/game.dir/solver.c.i

CMakeFiles/game.dir/solver.c.s: cmake_force
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green "Compiling C source to assembly CMakeFiles/game.dir/solver.c.s"
	/usr/bin/cc  $(C_DEFINES) $(C_INCLUDES) $(C_FLAGS) -S "/net/cremi/thdiallo/projet  c technologique/V1/solver.c" -o CMakeFiles/game.dir/solver.c.s

CMakeFiles/game.dir/solver.c.o.requires:

.PHONY : CMakeFiles/game.dir/solver.c.o.requires

CMakeFiles/game.dir/solver.c.o.provides: CMakeFiles/game.dir/solver.c.o.requires
	$(MAKE) -f CMakeFiles/game.dir/build.make CMakeFiles/game.dir/solver.c.o.provides.build
.PHONY : CMakeFiles/game.dir/solver.c.o.provides

CMakeFiles/game.dir/solver.c.o.provides.build: CMakeFiles/game.dir/solver.c.o


# Object files for target game
game_OBJECTS = \
"CMakeFiles/game.dir/game.c.o" \
"CMakeFiles/game.dir/game_io.c.o" \
"CMakeFiles/game.dir/solver.c.o"

# External object files for target game
game_EXTERNAL_OBJECTS =

libgame.a: CMakeFiles/game.dir/game.c.o
libgame.a: CMakeFiles/game.dir/game_io.c.o
libgame.a: CMakeFiles/game.dir/solver.c.o
libgame.a: CMakeFiles/game.dir/build.make
libgame.a: CMakeFiles/game.dir/link.txt
	@$(CMAKE_COMMAND) -E cmake_echo_color --switch=$(COLOR) --green --bold --progress-dir="/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles" --progress-num=$(CMAKE_PROGRESS_4) "Linking C static library libgame.a"
	$(CMAKE_COMMAND) -P CMakeFiles/game.dir/cmake_clean_target.cmake
	$(CMAKE_COMMAND) -E cmake_link_script CMakeFiles/game.dir/link.txt --verbose=$(VERBOSE)

# Rule to build all files generated by this target.
CMakeFiles/game.dir/build: libgame.a

.PHONY : CMakeFiles/game.dir/build

CMakeFiles/game.dir/requires: CMakeFiles/game.dir/game.c.o.requires
CMakeFiles/game.dir/requires: CMakeFiles/game.dir/game_io.c.o.requires
CMakeFiles/game.dir/requires: CMakeFiles/game.dir/solver.c.o.requires

.PHONY : CMakeFiles/game.dir/requires

CMakeFiles/game.dir/clean:
	$(CMAKE_COMMAND) -P CMakeFiles/game.dir/cmake_clean.cmake
.PHONY : CMakeFiles/game.dir/clean

CMakeFiles/game.dir/depend:
	cd "/net/cremi/thdiallo/projet  c technologique/V1" && $(CMAKE_COMMAND) -E cmake_depends "Unix Makefiles" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1" "/net/cremi/thdiallo/projet  c technologique/V1/CMakeFiles/game.dir/DependInfo.cmake" --color=$(COLOR)
.PHONY : CMakeFiles/game.dir/depend

