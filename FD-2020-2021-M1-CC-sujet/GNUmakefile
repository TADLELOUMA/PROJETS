USER = $(shell whoami)

TEX = pdflatex

MODEL = tank

SOURCE_ALT = Alt/$(MODEL).alt

SOURCE_SPEC = Spec/$(MODEL).spe

ARCHIVE_SUJET = FD-2020-2021-M1-CC-sujet.tgz

ARCHIVE_RAPPORT = FD-2020-2021-M1-CC-rapport-$(USER).tgz

ARCHIVE_CORRIGE = FD-2020-2021-M1-CC-corrige.tgz

TARGET_SUJET = sujet.pdf\
	$(ARCHIVE_SUJET)\

TARGET_RAPPORT = rapport-$(USER).pdf\
	$(ARCHIVE_RAPPORT)\

TARGET_CORRIGE = corrige.pdf\
	$(ARCHIVE_CORRIGE)\

TARGET = $(TARGET_SUJET)\
	$(TARGET_RAPPORT)\
	$(TARGET_CORRIGE)\

SOURCE_TEX = $(MODEL).tex\
	sujet.tex\
	rapport.tex\
	corrige.tex\

SUBDIRS = Alt Spec

SUBDIRS2 = Res Controleurs Graphs

SUBDIRS3 = ControleursOpt

SOURCE_SUJET = $(SUBDIRS)\
	Controleurs/GNUmakefile\
	ControleursOpt/GNUmakefile\
	ControleursOpt/Optimisation.alt\
	Graphs/GNUmakefile\
	Res/GNUmakefile\
	$(MODEL).tex\
	sujet.tex\
	sujet.pdf\
	TODO\
	rapport.tex\
	GNUmakefile\

SOURCE_RAPPORT = $(SUBDIRS)\
	$(SUBDIRS2)\
	$(SUBDIRS3)\
	$(MODEL).tex\
	rapport.tex\
	rapport-$(USER).pdf\
	GNUmakefile\

SOURCE_CORRIGE = $(SUBDIRS)\
	Controleurs/GNUmakefile\
	Graphs/GNUmakefile\
	Res/GNUmakefile\
	$(MODEL).tex\
	TODO\
	ControleursOpt/GNUmakefile\
	ControleursOpt/Optimisation.alt\
	corrige.tex\
	corrige.pdf\
	GNUmakefile\

# pour iterer sur le nombre de pannes
PANNES = 0 1 2 3

# pour iterer sur les controleurs generes
ITERATIONS = 1 2 3 4 5

# contient le controleur original
CONTROLEURS_INIT = Ctrl CtrlVV

# La liste des controleurs que l'on souhaite optimiser est genere automatiquement par la detection de la stabilite

all: sources $(MODEL).time $(TARGET)

clean:
	for d in $(SUBDIRS); do \
		$(MAKE) -C $$d $@ || exit 1;\
	done
	for d in $(SUBDIRS2); do \
		$(MAKE) -C $$d $@ || exit 1;\
	done
	rm -f *.dvi *.eps *.log *.aux *.toc *.bbl *.blg *.out *.snm *.nav *~ *.core

cleandir: clean
	for d in $(SUBDIRS); do \
		$(MAKE) -C $$d $@ || exit 1;\
	done
	for d in $(SUBDIRS2); do \
		$(MAKE) -C $$d $@ || exit 1;\
	done
	for d in $(SUBDIRS3); do \
		$(MAKE) -C $$d $@ || exit 1;\
	done
	rm -f *.dot *.prop *.res *.results *.validate
	rm -f $(TARGET) $(SOURCE_ALT) $(SOURCE_SPEC) $(MODEL).time

sources : 
	for d in $(SUBDIRS); do \
		$(MAKE) -C $$d all || exit 1;\
	done

$(MODEL).time: $(SOURCE_ALT) $(SOURCE_SPEC)
	for c in $(CONTROLEURS_INIT); do \
		for p in $(PANNES); do \
			cat Alt/Parameters.alt > Alt/tank.alt;\
			cat Alt/Valve.alt >> Alt/tank.alt;\
			cat Alt/ValveVirtual.alt >> Alt/tank.alt;\
			cat Alt/Tank.alt >> Alt/tank.alt;\
			cat 'Alt/'$$c'.alt' >> Alt/tank.alt;\
			cat Alt/System.alt >> Alt/tank.alt;\
			sed -e 's:NbPannes:'$$p':' -e 's:NomDuControleur:'$$c':' Alt/tank.alt > Alt/test.alt;\
			sed -e 's:CtrlInitial:'$$c':' -e 's:NbPannes:'$$p':' -e 's:NumIter:1I:' -e 's:NomDuControleur:'$$c':' Spec/System.spe > Spec/test.spe;\
			arc -b Alt/test.alt Spec/test.spe 2>> $(MODEL).time;\
			for d in $(ITERATIONS); do \
				cat Alt/Parameters.alt > Alt/tank.alt;\
				cat Alt/Valve.alt >> Alt/tank.alt;\
				cat Alt/ValveVirtual.alt >> Alt/tank.alt;\
				cat Alt/Tank.alt >> Alt/tank.alt;\
				cat 'Controleurs/'$$c$$p'F'$$d'I.alt' >> Alt/tank.alt;\
				cat Alt/System.alt >> Alt/tank.alt;\
				nd=$$(expr $$d + 1);\
				pd=$$(expr $$d - 1);\
				sed -e 's:NbPannes:'$$p':' -e 's:NomDuControleur:'$$c$$p'F'$$d'I:' Alt/tank.alt > Alt/test.alt;\
				sed -e 's:CtrlInitial:'$$c':' -e 's:NbPannes:'$$p':' -e 's:NumIter:'$$nd'I:' -e 's:NomDuControleur:'$$c$$p'F'$$d'I:' Spec/System.spe > Spec/test.spe;\
				arc -b Alt/test.alt Spec/test.spe 2>> $(MODEL).time;\
				if [ $$d -eq 1 ] ; \
				then diff -I "Properties for node" 'Res/System'$$p'F'$$c$$p'F'$$d'I.res' 'Res/System'$$p'F'$$c'.res';\
				else diff -I "Properties for node" 'Res/System'$$p'F'$$c$$p'F'$$d'I.res' 'Res/System'$$p'F'$$c$$p'F'$$pd'I.res';\
				fi;\
				if [ $$? -eq 0 ] ;\
				then \
					sed -e 's:'$$c$$p'F'$$d'I:'$$c$$p'F'$$d'I_Opt:' -e 's:edon::' 'Controleurs/'$$c$$p'F'$$d'I.alt' > 'ControleursOpt/'$$c$$p'F'$$d'I_Opt.alt';\
					cat ControleursOpt/Optimisation.alt >> 'ControleursOpt/'$$c$$p'F'$$d'I_Opt.alt';\
					cat Alt/Parameters.alt > Alt/tank.alt;\
					cat Alt/Valve.alt >> Alt/tank.alt;\
					cat Alt/ValveVirtual.alt >> Alt/tank.alt;\
					cat Alt/Tank.alt >> Alt/tank.alt;\
					cat 'ControleursOpt/'$$c$$p'F'$$d'I_Opt.alt' >> Alt/tank.alt;\
					cat Alt/System.alt >> Alt/tank.alt;\
					nd=$$(expr $$d + 1);\
					pd=$$(expr $$d - 1);\
					sed -e 's:NbPannes:'$$p':' -e 's:NomDuControleur:'$$c$$p'F'$$d'I_Opt:' Alt/tank.alt > Alt/test.alt;\
					sed -e 's:CtrlInitial:'$$c':' -e 's:NbPannes:'$$p':' -e 's:NumIter:'$$nd'I_Opt:' -e 's:NomDuControleur:'$$c$$p'F'$$d'I_Opt:' Spec/System.spe > Spec/test.spe;\
					arc -b Alt/test.alt Spec/test.spe 2>> $(MODEL).time;\
					break ;\
				fi;\
			done;\
		done;\
	done;
	for d in $(SUBDIRS2); do \
		$(MAKE) -C $$d || exit 1;\
	done
	uname -mps > $(MODEL).time

sujet.pdf: sujet.tex

rapport.pdf: rapport.tex $(MODEL).time

rapport-$(USER).pdf: rapport.pdf
	mv rapport.pdf rapport-$(USER).pdf

corrige.pdf: corrige.tex $(MODEL).time

$(ARCHIVE_SUJET): $(SOURCE_SUJET)
	tar -czf $(ARCHIVE_SUJET) $(SOURCE_SUJET)

$(ARCHIVE_RAPPORT): $(SOURCE_RAPPORT)
	tar -czf $(ARCHIVE_RAPPORT) $(SOURCE_RAPPORT)

$(ARCHIVE_CORRIGE): $(SOURCE_CORRIGE)
	tar -czf $(ARCHIVE_CORRIGE) $(SOURCE_CORRIGE)

.SUFFIXES: .pdf .tex

.tex.pdf:
	$(TEX) $*.tex && $(TEX) $*.tex
