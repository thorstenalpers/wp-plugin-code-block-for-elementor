<?php

namespace CodeBlockForElementor;

use \Elementor\Repeater;
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Code_Block_Widget extends Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'code-block-for-elementor-coy', plugins_url( '../assets/prism-coy.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-dark', plugins_url( '../assets/prism-dark.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-default', plugins_url( '../assets/prism-default.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-funky', plugins_url( '../assets/prism-funky.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-okaidia', plugins_url( '../assets/prism-okaidia.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-solarized-light', plugins_url( '../assets/prism-solarized-light.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-tomorrow-night', plugins_url( '../assets/prism-tomorrow-night.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-twilight', plugins_url( '../assets/prism-twilight.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );
		wp_register_style( 'code-block-for-elementor-toolbar', plugins_url( '../assets/prism-toolbar.css', __FILE__ ), [], CODE_BLOCK_FOR_ELEMENTOR_VERSION );

		wp_register_script( 'code-block-for-elementor-prismjs', plugins_url( '../assets/prism.js', __FILE__ ), ['jquery'], CODE_BLOCK_FOR_ELEMENTOR_VERSION, true );
		wp_register_script( 'code-block-for-elementor-toolbarjs', plugins_url( '../assets/prism-toolbar.js', __FILE__ ), ['jquery'], CODE_BLOCK_FOR_ELEMENTOR_VERSION, true );
	}
	
	public function get_name() { return CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME; }

	public function get_title() { return __(CODE_BLOCK_FOR_ELEMENTOR_TITLE, CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME); }

	public function get_icon() { return CODE_BLOCK_FOR_ELEMENTOR_ICON; }

	public function get_categories() { return [ 'basic' ]; }
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 	'code-block-for-elementor-coy', 
						'code-block-for-elementor-dark', 
						'code-block-for-elementor-default', 
						'code-block-for-elementor-funky', 
						'code-block-for-elementor-okaidia', 
						'code-block-for-elementor-solarized-light', 
						'code-block-for-elementor-tomorrow-night', 
						'code-block-for-elementor-twilight',
						'code-block-for-elementor-toolbar');
	}
	
	/**
	 * Enqueue scripts.
	 */
	public function get_script_depends() {
		return array( 'code-block-for-elementor-prismjs', 'code-block-for-elementor-toolbarjs' );
	}
	
	/**
	 * Register controls.
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'controls_section',
			[
				'label' => __( CODE_BLOCK_FOR_ELEMENTOR_TITLE, CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);		
				
		$this->add_control(
			'theme',
			[
				'label' => __( 'Theme', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'Coy' => __( 'Coy', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'Dark' => __( 'Dark', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'Default' => __( 'Default', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'Funky' => __( 'Funky', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'Okaidia' => __( 'Okaidia', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'Solarized Light' => __( 'Solarized Light', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'Tomorrow Night' => __( 'Tomorrow Night', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'Twilight' => __( 'Twilight', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME )
				],
				'default' => 'Okaidia'
			]
		);

		$this->add_control(
			'language',
			[
				'label' => __( 'Language', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'abap' => __( 'abap', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'abnf' => __( 'abnf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'actionscript' => __( 'actionscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ada' => __( 'ada', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'adoc' => __( 'adoc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'agda' => __( 'agda', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'al' => __( 'al', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'antlr4' => __( 'antlr4', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'apacheconf' => __( 'apacheconf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'apex' => __( 'apex', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'apl' => __( 'apl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'applescript' => __( 'applescript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'aql' => __( 'aql', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'arduino' => __( 'arduino', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'arff' => __( 'arff', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'asciidoc' => __( 'asciidoc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'asm6502' => __( 'asm6502', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'aspnet' => __( 'aspnet', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'atom' => __( 'atom', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'autohotkey' => __( 'autohotkey', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'autoit' => __( 'autoit', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'bash' => __( 'bash', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'basic' => __( 'basic', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'batch' => __( 'batch', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'bbcode' => __( 'bbcode', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'birb' => __( 'birb', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'bison' => __( 'bison', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'bnf' => __( 'bnf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'brainfuck' => __( 'brainfuck', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'brightscript' => __( 'brightscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'bro' => __( 'bro', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'bsl' => __( 'bsl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'c' => __( 'c', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'cil' => __( 'cil', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'clike' => __( 'clike', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'clojure' => __( 'clojure', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'cmake' => __( 'cmake', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'coffee' => __( 'coffee', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'coffeescript' => __( 'coffeescript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'conc' => __( 'conc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'concurnas' => __( 'concurnas', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'context' => __( 'context', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'cpp' => __( 'cpp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'crystal' => __( 'crystal', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'cs' => __( 'cs', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'csharp' => __( 'csharp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'csp' => __( 'csp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'css' => __( 'css', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'cypher' => __( 'cypher', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'd' => __( 'd', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dart' => __( 'dart', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dataweave' => __( 'dataweave', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dax' => __( 'dax', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'DFS' => __( 'DFS', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dhall' => __( 'dhall', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'diff' => __( 'diff', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'django' => __( 'django', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dns-zone' => __( 'dns-zone', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dns-zone-file' => __( 'dns-zone-file', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'docker' => __( 'docker', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dockerfile' => __( 'dockerfile', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'dotnet' => __( 'dotnet', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ebnf' => __( 'ebnf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'editorconfig' => __( 'editorconfig', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'eiffel' => __( 'eiffel', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ejs' => __( 'ejs', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'elisp' => __( 'elisp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'elixir' => __( 'elixir', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'elm' => __( 'elm', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'emacs' => __( 'emacs', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'emacs-lisp' => __( 'emacs-lisp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'erb' => __( 'erb', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'erlang' => __( 'erlang', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'eta' => __( 'eta', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'etlua' => __( 'etlua', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'excel-formula' => __( 'excel-formula', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'extend' => __( 'extend', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'factor' => __( 'factor', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'firestore-security-rules' => __( 'firestore-security-rules', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'flow' => __( 'flow', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'fortran' => __( 'fortran', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'fsharp' => __( 'fsharp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ftl' => __( 'ftl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'g4' => __( 'g4', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'gamemakerlanguage' => __( 'gamemakerlanguage', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'gcode' => __( 'gcode', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'gdscript' => __( 'gdscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'gedcom' => __( 'gedcom', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'gherkin' => __( 'gherkin', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'git' => __( 'git', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'gitignore' => __( 'gitignore', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'glsl' => __( 'glsl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'gml' => __( 'gml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'go' => __( 'go', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'graphql' => __( 'graphql', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'groovy' => __( 'groovy', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'haml' => __( 'haml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'handlebars' => __( 'handlebars', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'haskell' => __( 'haskell', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'haxe' => __( 'haxe', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'hcl' => __( 'hcl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'hgignore' => __( 'hgignore', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'hlsl' => __( 'hlsl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'hpkp' => __( 'hpkp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'hs' => __( 'hs', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'hsts' => __( 'hsts', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'html' => __( 'html', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'http' => __( 'http', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ichigojam' => __( 'ichigojam', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'icon' => __( 'icon', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'iecst' => __( 'iecst', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ignore' => __( 'ignore', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'inform7' => __( 'inform7', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ini' => __( 'ini', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'insertBefore' => __( 'insertBefore', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'io' => __( 'io', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'j' => __( 'j', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'java' => __( 'java', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'javadoc' => __( 'javadoc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'javadoclike' => __( 'javadoclike', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'javascript' => __( 'javascript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'javastacktrace' => __( 'javastacktrace', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'jinja2' => __( 'jinja2', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'jolie' => __( 'jolie', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'jq' => __( 'jq', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'js' => __( 'js', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'jsdoc' => __( 'jsdoc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'json' => __( 'json', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'json5' => __( 'json5', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'jsonp' => __( 'jsonp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'jsstacktrace' => __( 'jsstacktrace', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'jsx' => __( 'jsx', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'julia' => __( 'julia', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'keyman' => __( 'keyman', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'kotlin' => __( 'kotlin', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'kt' => __( 'kt', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'kts' => __( 'kts', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'latex' => __( 'latex', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'latte' => __( 'latte', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'less' => __( 'less', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'lilypond' => __( 'lilypond', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'liquid' => __( 'liquid', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'lisp' => __( 'lisp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'livescript' => __( 'livescript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'llvm' => __( 'llvm', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'lolcode' => __( 'lolcode', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'lua' => __( 'lua', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ly' => __( 'ly', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'makefile' => __( 'makefile', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'markdown' => __( 'markdown', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'markup' => __( 'markup', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'markup-templating' => __( 'markup-templating', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'mathml' => __( 'mathml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'matlab' => __( 'matlab', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'md' => __( 'md', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'mel' => __( 'mel', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'mizar' => __( 'mizar', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'mongodb' => __( 'mongodb', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'monkey' => __( 'monkey', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'moon' => __( 'moon', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'moonscript' => __( 'moonscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'mscript' => __( 'mscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'n1ql' => __( 'n1ql', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'n4js' => __( 'n4js', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'n4jsd' => __( 'n4jsd', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'nand2tetris-hdl' => __( 'nand2tetris-hdl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'nani' => __( 'nani', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'naniscript' => __( 'naniscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'nasm' => __( 'nasm', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'neon' => __( 'neon', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'nginx' => __( 'nginx', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'nim' => __( 'nim', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'nix' => __( 'nix', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'npmignore' => __( 'npmignore', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'nsis' => __( 'nsis', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'objc' => __( 'objc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'objectivec' => __( 'objectivec', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'objectpascal' => __( 'objectpascal', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ocaml' => __( 'ocaml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'opencl' => __( 'opencl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'oscript' => __( 'oscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'oz' => __( 'oz', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'parigp' => __( 'parigp', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'parser' => __( 'parser', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pascal' => __( 'pascal', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pascaligo' => __( 'pascaligo', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pbfasm' => __( 'pbfasm', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pcaxis' => __( 'pcaxis', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pcode' => __( 'pcode', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'peoplecode' => __( 'peoplecode', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'perl' => __( 'perl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'php' => __( 'php', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'phpdoc' => __( 'phpdoc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'plsql' => __( 'plsql', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'powerquery' => __( 'powerquery', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'powershell' => __( 'powershell', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pq' => __( 'pq', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'processing' => __( 'processing', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'prolog' => __( 'prolog', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'promql' => __( 'promql', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'properties' => __( 'properties', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'protobuf' => __( 'protobuf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pug' => __( 'pug', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'puppet' => __( 'puppet', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'pure' => __( 'pure', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'purebasic' => __( 'purebasic', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'purescript' => __( 'purescript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'purs' => __( 'purs', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'px' => __( 'px', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'py' => __( 'py', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'python' => __( 'python', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'q' => __( 'q', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'qml' => __( 'qml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'qore' => __( 'qore', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'r' => __( 'r', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'racket' => __( 'racket', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rb' => __( 'rb', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rbnf' => __( 'rbnf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'reason' => __( 'reason', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'regex' => __( 'regex', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'renpy' => __( 'renpy', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rest' => __( 'rest', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rip' => __( 'rip', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rkt' => __( 'rkt', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'roboconf' => __( 'roboconf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'robot' => __( 'robot', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'robotframework' => __( 'robotframework', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rpy' => __( 'rpy', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rq' => __( 'rq', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rss' => __( 'rss', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ruby' => __( 'ruby', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'rust' => __( 'rust', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sas' => __( 'sas', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sass' => __( 'sass', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'scala' => __( 'scala', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'scheme' => __( 'scheme', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'scss' => __( 'scss', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sh-session' => __( 'sh-session', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'shell' => __( 'shell', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'shell-session' => __( 'shell-session', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'shellsession' => __( 'shellsession', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'shortcode' => __( 'shortcode', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sln' => __( 'sln', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'smali' => __( 'smali', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'smalltalk' => __( 'smalltalk', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'smarty' => __( 'smarty', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sml' => __( 'sml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'smlnj' => __( 'smlnj', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sol' => __( 'sol', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'solidity' => __( 'solidity', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'solution-file' => __( 'solution-file', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'soy' => __( 'soy', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sparql' => __( 'sparql', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'splunk-spl' => __( 'splunk-spl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sqf' => __( 'sqf', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'sql' => __( 'sql', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ssml' => __( 'ssml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'stan' => __( 'stan', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'stylus' => __( 'stylus', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'svg' => __( 'svg', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'swift' => __( 'swift', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					't4' => __( 't4', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					't4-cs' => __( 't4-cs', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					't4-templating' => __( 't4-templating', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					't4-vb' => __( 't4-vb', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'tap' => __( 'tap', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'tcl' => __( 'tcl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'tex' => __( 'tex', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'textile' => __( 'textile', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'toml' => __( 'toml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'trig' => __( 'trig', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'ts' => __( 'ts', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'tsconfig' => __( 'tsconfig', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'tsx' => __( 'tsx', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'tt2' => __( 'tt2', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'turtle' => __( 'turtle', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'twig' => __( 'twig', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'typescript' => __( 'typescript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'typoscript' => __( 'typoscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'uc' => __( 'uc', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'unrealscript' => __( 'unrealscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'uscript' => __( 'uscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'vala' => __( 'vala', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'vb' => __( 'vb', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'vba' => __( 'vba', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'vbnet' => __( 'vbnet', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'velocity' => __( 'velocity', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'verilog' => __( 'verilog', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'vhdl' => __( 'vhdl', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'vim' => __( 'vim', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'visual-basic' => __( 'visual-basic', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'warpscript' => __( 'warpscript', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'wasm' => __( 'wasm', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'webmanifest' => __( 'webmanifest', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'wiki' => __( 'wiki', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'xeora' => __( 'xeora', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'xeoracube' => __( 'xeoracube', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'xls' => __( 'xls', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'xlsx' => __( 'xlsx', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'xml' => __( 'xml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'xojo' => __( 'xojo', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'xquery' => __( 'xquery', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'yaml' => __( 'yaml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'yang' => __( 'yang', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'yml' => __( 'yml', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
					'zig' => __( 'zig', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME )
				],
				'default' => 'javascript'
			]
		);
		
		$this->add_control(
			'show_line_numbers',
			[
				'label' => __( 'Line Numbers', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'label_off' => __( 'Hide', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'default' => __( 'yes' ),
			]
		);
				
		$this->add_control(
			'show_toolbar',
			[
				'label' => __( 'Copy to Clipboard', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'label_off' => __( 'Hide', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'default' => __( 'yes' ),
			]
		);
		

		$this->add_control(
			'content',
			[
				'label' => __( 'Code', CODE_BLOCK_FOR_ELEMENTOR_PLUGIN_NAME ),
				'type' => Controls_Manager::CODE,
				'language' => 'text',
				'rows' => 10,
			]
		);

		$this->end_controls_section();
	}

	// Written in PHP and used to generate the final HTML.
	protected function render() {
		$settings  = $this->get_settings_for_display();
	
		$language = $settings ['language'];
		$selected_theme = $settings ['theme'];
		$theme = $settings ['theme'];
		$show_line_numbers = $settings ['show_line_numbers'];
		$show_toolbar = $settings ['show_toolbar'];
		$content = htmlentities($settings ['content']);
		$pre_classes = "";

		if('yes' === $show_line_numbers ) {
			$pre_classes .= "line-numbers ";
		}
		
		if('yes' !== $show_toolbar ) {
			$show_toolbar = "no";
		}

		$pre_classes .= "theme-" . preg_replace('/\s+/', '-', strtolower($theme)); 

		echo "<pre class='$pre_classes' data-show-toolbar='$show_toolbar'><code class='language-$language'>$content</code></pre>";	
		
		if ( Plugin::instance()->editor->is_edit_mode() ) {
			$this->render_editor_script();
		}
	}
	
	/**
	 * Render editor scripts.
	 */
	protected function render_editor_script() {
		?>
		<script type="text/javascript">
		jQuery( document ).ready(function() {
			window.Prism.highlightAll();
			
			jQuery('pre[data-show-toolbar="no"]').siblings('div.toolbar').hide();
		});
		</script>
		<?php
	}
}