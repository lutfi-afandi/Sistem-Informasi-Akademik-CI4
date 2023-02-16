<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'filteradmin' => \App\Filters\FilterAdmin::class,
		'filtermhs' => \App\Filters\FilterMhs::class,
		'filterdsn' => \App\Filters\FilterDsn::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'filteradmin' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/'
				]
			],
			'filtermhs' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/'
				]
			],
			'filterdsn' => [
				'except' => [
					'auth', 'auth/*',
					'home', 'home/*',
					'/'
				]
			],
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'filteradmin' => [
				'except' => [
					'admin', 'admin/*',
					'home', 'home/*',
					'fakultas', 'fakultas/*',
					'gedung', 'gedung/*',
					'ruangan', 'ruangan/*',
					'prodi', 'prodi/*',
					'ta', 'ta/*',
					'matkul', 'matkul/*',
					'user', 'user/*',
					'dosen', 'dosen/*',
					'mahasiswa', 'mahasiswa/*',
					'kelas', 'kelas/*',
					'jadwalkuliah', 'jadwalkuliah/*',
					'/'
				]
			],
			'filtermhs' => [
				'except' => [
					'mhs', 'mhs/*',
					'home', 'home/*',
					'krs', 'krs/*',
					'/'
				]
			],
			'filterdsn' => [
				'except' => [
					'dsn', 'dsn/*',
					'home', 'home/*',
					'/'
				]
			],
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
