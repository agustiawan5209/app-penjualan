<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Bank
 *
 * @property int $id
 * @property string $nama_bank
 * @property string $no_rek
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereNamaBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereNoRek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereUpdatedAt($value)
 */
	class Bank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Barang
 *
 * @property int $id
 * @property string $gambar
 * @property string $nama_barang
 * @property string $kode_barang
 * @property string $harga
 * @property int $stock
 * @property string $deskripsi
 * @property int $satuan_id
 * @property int $jenis_id
 * @property string $tgl_perolehan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Diskon[] $diskon
 * @property-read int|null $diskon_count
 * @property-read \App\Models\Jenis|null $jenis
 * @property-read \App\Models\Satuan|null $satuan
 * @method static \Database\Factories\BarangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereGambar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereJenisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereKodeBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereNamaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereSatuanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereTglPerolehan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUpdatedAt($value)
 */
	class Barang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Diskon
 *
 * @property int $id
 * @property int $barang_id
 * @property int $jumlah_diskon
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @method static \Database\Factories\DiskonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon newQuery()
 * @method static \Illuminate\Database\Query\Builder|Diskon onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereJumlahDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Diskon withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Diskon withoutTrashed()
 */
	class Diskon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Jenis
 *
 * @property int $id
 * @property string $nama_jenis
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereNamaJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jenis whereUpdatedAt($value)
 */
	class Jenis extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Katalog
 *
 * @property int $id
 * @property string $nama_katalog
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Katalog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Katalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Katalog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Katalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katalog whereNamaKatalog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Katalog whereUpdatedAt($value)
 */
	class Katalog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Keranjang
 *
 * @property int $id
 * @property int $user_id
 * @property int $barang_id
 * @property int $quantity
 * @property int|null $potongan_persen
 * @property int|null $potongan_nominal
 * @property int $total_awal
 * @property int $sub_total
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\KeranjangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang wherePotonganNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang wherePotonganPersen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereTotalAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Keranjang whereUserId($value)
 */
	class Keranjang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Membership
 *
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 */
	class Membership extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ongkir
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Ongkir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ongkir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ongkir query()
 */
	class Ongkir extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pembayaran
 *
 * @property int $id
 * @property int $user_id
 * @property string $number
 * @property string $total_price
 * @property string $payment_status 1 = Belum Di Bayar, 2 = Pembayaran Berhasil , 3 = Konfirmasi
 * @property string|null $payment_type
 * @property string|null $pdf_url
 * @property string|null $transaksi_id
 * @property string $tgl_transaksi
 * @property string $item_details
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ongkir|null $ongkir
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\PembayaranFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereItemDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran wherePdfUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTglTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembayaran whereUserId($value)
 */
	class Pembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pengiriman
 *
 * @property int $id
 * @property int $pembayaran_id
 * @property string $alamat_detail
 * @property int $harga
 * @property string $tgl_pengiriman
 * @property string $status 1 = belum dikirim ,2 dalam pengiriman, 3 = konfirmasi admin, 4 = konfirmasi user, 5 = gagal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman whereAlamatDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman wherePembayaranId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman whereTglPengiriman($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pengiriman whereUpdatedAt($value)
 */
	class Pengiriman extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Promo
 *
 * @property int $id
 * @property string $kode_promo
 * @property int|null $promo_nominal
 * @property int|null $promo_persen
 * @property int|null $max_user
 * @property int|null $use_user
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereKodePromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereMaxUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePromoNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePromoPersen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUseUser($value)
 */
	class Promo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Satuan
 *
 * @property int $id
 * @property string $nama_satuan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @method static \Illuminate\Database\Eloquent\Builder|Satuan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Satuan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Satuan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Satuan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Satuan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Satuan whereNamaSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Satuan whereUpdatedAt($value)
 */
	class Satuan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slide
 *
 * @property int $id
 * @property string $slide
 * @property string $deskripsi
 * @property string $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereSlide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 */
	class Slide extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StatusBarang
 *
 * @property int $id
 * @property string $status
 * @property string $detail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang query()
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StatusBarang whereUpdatedAt($value)
 */
	class StatusBarang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property bool $personal_team
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TeamInvitation[] $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\TeamFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TeamInvitation
 *
 * @property int $id
 * @property int $team_id
 * @property string $email
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team $team
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUpdatedAt($value)
 */
	class TeamInvitation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaksi
 *
 * @property int $id
 * @property string $ID_transaksi
 * @property string $tgl_transaksi
 * @property string $item_details
 * @property int $barang_id
 * @property int $potongan
 * @property string $total
 * @property string $status 0 = Diterima, 1 = Dikembalikan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TransaksiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereIDTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereItemDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePotongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTglTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereUpdatedAt($value)
 */
	class Transaksi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string $role_id
 * @property string|null $no_telpon
 * @property string|null $alamat
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team|null $currentTeam
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNoTelpon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UsesUserPromo
 *
 * @property int $id
 * @property int $user_id
 * @property int $promo_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Promo|null $promo
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\UsesUserPromoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo query()
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo wherePromoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserPromo whereUserId($value)
 */
	class UsesUserPromo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UsesUserVoucher
 *
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Voucher|null $voucher
 * @method static \Database\Factories\UsesUserVoucherFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserVoucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserVoucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UsesUserVoucher query()
 */
	class UsesUserVoucher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Voucher
 *
 * @property int $id
 * @property string $kode_voucher
 * @property int|null $promo_nominal
 * @property int|null $promo_persen
 * @property int|null $max_user
 * @property int|null $use_user
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereKodeVoucher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereMaxUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher wherePromoNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher wherePromoPersen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUseUser($value)
 */
	class Voucher extends \Eloquent {}
}

