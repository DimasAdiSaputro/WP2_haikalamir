<div class="container">
	<ul class="nav nav-tabs navbar-dark justify-content-evenly">
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() . 'user' ?>">Dashboard</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() . 'buku' ?>">Buku</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?= base_url() . 'user/profile' ?>">Profile</a>
		</li>
	</ul>
</div>

<?php if($this->router->fetch_class() == 'buku') { ?>
<div class="container mt-5">
	<ul class="nav nav-tabs navbar-dark justify-content-start mt-5">
		<li class="nav-item">
			<a class="nav-link buku-nav" href="<?= base_url() . 'buku' ?>">Buku</a>
		</li>
		<li class="nav-item">
			<a class="nav-link buku-nav" href="<?= base_url() . 'buku/cari' ?>">Pencarian</a>
		</li>
		<?php if($this->session->userdata('role') == 1) {?>
			<li class="nav-item">
				<a class="nav-link buku-nav" href="<?= base_url() . 'buku/add' ?>">Tambah</a>
			</li>
		<?php } ?>
	</ul>
</div>
<script>
	document.querySelectorAll('.nav-link.buku-nav').forEach((el, i) => {
		let a_link = el.getAttribute('href');
		if (a_link === window.location.href) {
			el.classList.add('active');
		}
	});
</script>
<?php } ?>

<script>
	let path = window.location.href.split('<?= base_url() ?>')[1].split('/');
	console.log(path[0], '=>', path[1]);
	document.querySelectorAll('.nav-link').forEach((el, i) => {
		let a_link = el.getAttribute('href');
		if(path[0] == 'user') {
			if (a_link === window.location.href) {
				el.classList.add('active');
			}
		}
		if(path[0] == 'buku') {
			if(i == 1) {
				el.classList.add('active');
			}
		}
	});
</script>