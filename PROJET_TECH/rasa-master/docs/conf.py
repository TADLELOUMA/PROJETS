#
# -- General configuration ------------------------------------------------
import re
import sys

nitpicky = True
linkcheck_anchors_ignore = [".*"]
linkcheck_ignore = [
    r"http://localhost:\d+/",
    r"https://github.com/mit-nlp/MITIE/releases/download/",
]
linkcheck_retries = 2
linkcheck_timeout = 5
# If your documentation needs a minimal Sphinx version, state it here.
# needs_sphinx = '1.0'

# Add any Sphinx extension module names here, as strings. They can be
# extensions coming with Sphinx (named 'sphinx.ext.*') or your custom
# ones.
extensions = [
    "sphinx.ext.autodoc",
    "sphinx_autodoc_typehints",
    "sphinx.ext.napoleon",
    "sphinx.ext.mathjax",
    "sphinx.ext.doctest",
    "sphinx.ext.extlinks",
    "sphinx_tabs.tabs",
    "sphinxcontrib.programoutput",
    "sphinxcontrib.httpdomain",
    "rasabaster.button",
    "rasabaster.card",
    "rasabaster.chatbubble",
    "rasabaster.copyable",
    "rasabaster.editlink",
    "rasabaster.runnable",
    "rasabaster.conversations",
]

# Add any paths that contain templates here, relative to this directory.
templates_path = ["_templates"]

# The suffix(es) of source filenames.
# You can specify multiple suffix as a list of string:
# source_suffix = ['.rst', '.md']
source_suffix = ".rst"

# The encoding of source files.
# source_encoding = 'utf-8-sig'

# The master toctree document.
master_doc = "index"

# General information about the project.
project = "Rasa"
copyright = "2020, Rasa Technologies"
author = "Rasa Technologies"

# The version info for the project you're documenting, acts as replacement for
# |version| and |release|, also used in various other places throughout the
# built documents.
#
# The short X.Y version.
__version__ = None
exec(open("../rasa/version.py").read())
version = ".".join(__version__.split(".")[:2])
# The full version, including alpha/beta/rc tags.
release = __version__

# The language for content autogenerated by Sphinx. Refer to documentation
# for a list of supported languages.
#
# This is also used if you do content translation via gettext catalogs.
# Usually you set "language" from the command line for these cases.
language = None

# There are two options for replacing |today|: either, you set today to some
# non-false value, then it is used:
# today = ''
# Else, today_fmt is used as the format for a strftime call.
# today_fmt = '%B %d, %Y'

# List of patterns, relative to source directory, that match files and
# directories to ignore when looking for source files.
# This patterns also effect to html_static_path and html_extra_path
exclude_patterns = [
    "_build",
    "Thumbs.db",
    ".DS_Store",
    # ignore doc pages that we don't show to appease keep_warnings
    "core/old-core-change-log.rst",
    "core/old-core-migration-guide.rst",
    "nlu/old-nlu-change-log.rst",
    "nlu/old-nlu-migration-guide.rst",
]

# The reST default role (used for this markup: `text`) to use for all
# documents.
# default_role = None

# If true, '()' will be appended to :func: etc. cross-reference text.
# add_function_parentheses = True

# If true, the current module name will be prepended to all description
# unit titles (such as .. function::).
# add_module_names = True

# If true, sectionauthor and moduleauthor directives will be shown in the
# output. They are ignored by default.
# show_authors = False

# The name of the Pygments (syntax highlighting) style to use.
pygments_style = "sphinx"

# A list of ignored prefixes for module index sorting.
# modindex_common_prefix = []

# If true, keep warnings as "system message" paragraphs in the built documents.
# keep_warnings = False

# If true, `todo` and `todoList` produce output, else they produce nothing.
todo_include_todos = False


# -- Options for HTML output ----------------------------------------------

# The theme to use for HTML and HTML Help pages.  See the documentation for
# a list of builtin themes.
# html_theme = 'default'

html_theme = "rasabaster"

# Theme options are theme-specific and customize the look and feel of a theme
# further.  For a list of options available for each theme, see the
# documentation.
html_theme_options = {
    "description": "Rasa",
    "github_user": "RasaHQ",
    "github_repo": "rasa_nlu",
    "fixed_sidebar": True,
    "product": "Rasa",
    "base_url": "https://rasa.com/docs/rasa/",
}
# html_theme_options = {}

# Add any paths that contain custom themes here, relative to this directory.
# html_theme_path = []

# The name for this set of Sphinx documents.
# "<project> v<release> documentation" by default.
html_title = ""

# A shorter title for the navigation bar.  Default is the same as html_title.
# html_short_title = None

# The name of an image file (relative to this directory) to place at the top
# of the sidebar.
# html_logo = None

# The name of an image file (relative to this directory) to use as a favicon of
# the docs.  This file should be a Windows icon file (.ico) being 16x16 or 32x32
# pixels large.
# html_favicon = None

# Add any paths that contain custom static files (such as style sheets) here,
# relative to this directory. They are copied after the builtin static files,
# so a file named "default.css" will overwrite the builtin "default.css".
html_static_path = ["_static"]

# Add any extra paths that contain custom files (such as robots.txt or
# .htaccess) here, relative to this directory. These files are copied
# directly to the root of the documentation.
# html_extra_path = []

# If not None, a 'Last updated on:' timestamp is inserted at every page
# bottom, using the given strftime format.
# The empty string is equivalent to '%b %d, %Y'.
# html_last_updated_fmt = None

# If true, SmartyPants will be used to convert quotes and dashes to
# typographically correct entities.
# html_use_smartypants = True

# Custom sidebar templates, maps document names to template names.
html_sidebars = {"**": ["simpletoc.html"]}

# Additional templates that should be rendered to pages, maps page names to
# template names.
# html_additional_pages = {}

# If false, no module index is generated.
# html_domain_indices = True

# If false, no index is generated.
# html_use_index = True

# If true, the index is split into individual pages for each letter.
# html_split_index = False

# If true, links to the reST sources are added to the pages.
# html_show_sourcelink = True

# If true, "Created using Sphinx" is shown in the HTML footer. Default is True.
# html_show_sphinx = True

# If true, "(C) Copyright ..." is shown in the HTML footer. Default is True.
# html_show_copyright = True

# If true, an OpenSearch description file will be output, and all pages will
# contain a <link> tag referring to it.  The value of this option must be the
# base URL from which the finished HTML is served.
# html_use_opensearch = ''

# This is the file name suffix for HTML files (e.g. ".xhtml").
# html_file_suffix = None

# Language to be used for generating the HTML full-text search index.
# Sphinx supports the following languages:
#   'da', 'de', 'en', 'es', 'fi', 'fr', 'hu', 'it', 'ja'
#   'nl', 'no', 'pt', 'ro', 'ru', 'sv', 'tr', 'zh'
# html_search_language = 'en'

# A dictionary with options for the search language support, empty by default.
# 'ja' uses this config value.
# 'zh' user can custom change `jieba` dictionary path.
# html_search_options = {'type': 'default'}

# The name of a javascript file (relative to the configuration directory) that
# implements a search results scorer. If empty, the default will be used.
# html_search_scorer = 'scorer.js'

# Output file base name for HTML help builder.
htmlhelp_basename = "rasa_doc"

# -- Options for LaTeX output ---------------------------------------------

latex_elements = {
    # The paper size ('letterpaper' or 'a4paper').
    #'papersize': 'letterpaper',
    # The font size ('10pt', '11pt' or '12pt').
    #'pointsize': '10pt',
    # Additional stuff for the LaTeX preamble.
    #'preamble': '',
    # Latex figure (float) alignment
    #'figure_align': 'htbp',
}

# Grouping the document tree into LaTeX files. List of tuples
# (source start file, target name, title,
#  author, documentclass [howto, manual, or own class]).
latex_documents = [
    (master_doc, "rasa_nlu.tex", "rasa\\_nlu Documentation", "Alan Nichol", "manual")
]

# The name of an image file (relative to this directory) to place at the top of
# the title page.
# latex_logo = None

# For "manual" documents, if this is true, then toplevel headings are parts,
# not chapters.
# latex_use_parts = False

# If true, show page references after internal links.
# latex_show_pagerefs = False

# If true, show URL addresses after external links.
# latex_show_urls = False

# Documents to append as an appendix to all manuals.
# latex_appendices = []

# If false, no module index is generated.
# latex_domain_indices = True


# -- Options for manual page output ---------------------------------------

# One entry per manual page. List of tuples
# (source start file, name, description, authors, manual section).
man_pages = [(master_doc, "rasa_nlu", "rasa_nlu Documentation", [author], 1)]

# If true, show URL addresses after external links.
# man_show_urls = False


# -- Options for Texinfo output -------------------------------------------

# Grouping the document tree into Texinfo files. List of tuples
# (source start file, target name, title, author,
#  dir menu entry, description, category)
texinfo_documents = [
    (
        master_doc,
        "rasa",
        "rasa Documentation",
        author,
        "rasa",
        "One line description of project.",
        "Miscellaneous",
    )
]

# Documents to append as an appendix to all manuals.
# texinfo_appendices = []

# If false, no module index is generated.
# texinfo_domain_indices = True

# How to display URL addresses: 'footnote', 'no', or 'inline'.
# texinfo_show_urls = 'footnote'

# If true, do not generate a @detailmenu in the "Top" node's menu.
# texinfo_no_detailmenu = False

import os

doctest_path = [os.path.abspath("..")]

# Make sure we are using the project root as the working directory instead of /docs
doctest_global_setup = r"""
import os
os.chdir(os.path.abspath('..'))
"""

# extlinks configuration

extlinks = {"gh-code": (f"https://github.com/RasaHQ/rasa/tree/{release}/%s", "github ")}

# Sphinxcontrib configuration
scv_priority = "tags"
scv_show_banner = True
scv_banner_greatest_tag = True
scv_sort = ("semver",)
scv_whitelist_branches = (re.compile("^master$"),)
# scv_whitelist_tags = ('None',)
scv_grm_exclude = ("README.md", ".gitignore", ".nojekyll", "CNAME")
scv_whitelist_tags = (
    re.compile(r"^[2-9]+\.\d+\.\d+$"),
    re.compile(r"^1\.[1-9][0-9]+\.\d+$"),
    re.compile(r"^1\.[6789]\.\d+$"),
    re.compile(r"^1\.5\.3$"),
    re.compile(r"^1\.4\.6$"),
    re.compile(r"^1\.3\.10$"),
    re.compile(r"^1\.2\.9$"),
    re.compile(r"^1\.1\.8$"),
    re.compile(r"^1\.0\.9$"),
)
scv_greatest_tag = True

# type classes for nitpicky to ignore
nitpick_ignore = [
    # non-rasa typing
    ("py:class", "str"),
    ("py:class", "bool"),
    ("py:class", "int"),
    ("py:class", "Any"),
    ("py:class", "dict"),
    ("py:class", "Dict"),
    ("py:class", "List"),
    ("py:class", "Text"),
    ("py:class", "Optional"),
    ("py:class", "Iterator"),
    ("py:class", "typing.Any"),
    ("py:class", "typing.Dict"),
    ("py:class", "typing.List"),
    ("py:class", "typing.Optional"),
    ("py:class", "typing.Generator"),
    ("py:class", "typing.Iterator"),
    ("py:class", "collections.deque"),
    ("py:class", "sanic.app.Sanic"),
    ("py:data", "typing.Any"),
    ("py:data", "typing.Dict"),
    ("py:data", "typing.List"),
    ("py:data", "typing.Optional"),
    ("py:data", "typing.Iterator"),
    ("py:obj", "None"),
    # rasa typing
    ("py:class", "CollectingDispatcher"),
    ("py:class", "Tracker"),
    ("py:class", "rasa.core.agent.Agent"),
    ("py:class", "rasa.core.conversation.Dialogue"),
    ("py:class", "rasa.core.domain.Domain"),
    ("py:class", "rasa.core.policies.Policy"),
    ("py:class", "rasa.core.events.Event"),
    ("py:class", "rasa.core.events.SlotSet"),
    ("py:class", "rasa.core.processor.MessageProcessor"),
    ("py:class", "rasa.core.training.structures.StoryGraph"),
    ("py:class", "rasa.nlu.components.Component"),
    ("py:class", "rasa.nlu.training_data.message.Message"),
    ("py:class", "rasa.nlu.training_data.training_data.TrainingData"),
]


def setup(sphinx):
    sphinx.add_stylesheet("css/custom.css")

    try:
        utils_path = os.path.abspath(os.path.join(__file__, "..", "utils"))
        sys.path.insert(0, utils_path)
        from StoryLexer import StoryLexer

        sphinx.add_lexer("story", StoryLexer())
    except ImportError:
        print("No Story Lexer :( Sad times!")