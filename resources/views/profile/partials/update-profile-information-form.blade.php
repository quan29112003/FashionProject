<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="row">
            {{-- user name --}}
            <div class="col-6 my-2">
                <x-input-label for="name_user" :value="__('Họ và Tên')" />
                <x-text-input id="name_user" name="name_user" type="text" class="mt-1 block w-full" :value="old('name_user', $user->name_user)"
                    autofocus autocomplete="name_user" />
                <x-input-error class="mt-2" :messages="$errors->get('name_user')" />
            </div>

            {{-- number phone --}}
            <div class="col-6 my-2">
                <x-input-label for="number_phone" :value="__('Số điện thoại')" />
                <x-text-input id="number_phone" name="number_phone" type="text" class="mt-1 block w-full"
                    :value="old('number_phone', $user->number_phone)" autofocus autocomplete="number_phone" />
                <x-input-error class="mt-2" :messages="$errors->get('number_phone')" />
            </div>

            {{-- birthday --}}
            <div class="col-3 my-2">
                <x-input-label for="birthday" :value="__('Ngày sinh')" />
                <x-text-input id="birthday" name="birthday" type="text" class="mt-1 block w-full flatpickr"
                    value="{{ old('birthday', $user->birthday) }}" autocomplete="birthday" />
                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
            </div>
            {{-- @dump($user->birthday) --}}

            {{-- age --}}
            <div class="col-3 my-2">
                <x-input-label for="age" :value="__('Tuổi')" />
                <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)"
                    autocomplete="age" readonly />
                <x-input-error class="mt-2" :messages="$errors->get('age')" />
            </div>

            {{-- email --}}
            <div class="col-6 my-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    autocomplete="username" readonly />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            {{-- address --}}
            <div class="col-12">
                <div class="row">
                    <div class="col-12 my-2" id="currentAddressSection" onclick="showEditForm()">
                        <x-input-label for="address" :value="__('Địa chỉ')" />
                        <textarea id="address" name="address"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            autocomplete="address" readonly>{{ old('address', $user->address) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>
                </div>
            </div>

            <div id="editAddressSection" class="col-12">
                <div class="row">
                    <div class="col-3 my-2">
                        <x-input-label for="specific_address" :value="__('Số nhà/Tên đường')" />
                        <x-text-input id="specific_address" name="specific_address" type="text"
                            class="mt-1 block w-full" :value="$specific_addressName" autofocus autocomplete="specific_address" />
                        <x-input-error class="mt-2" :messages="$errors->get('specific_address')" />
                    </div>

                    <div class="col-3 my-2">
                        <x-input-label for="ward" :value="__('Xã/Phường')" />
                        <select id="ward" name="ward"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Select Ward</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('ward')" />
                    </div>

                    <div class="col-3 my-2">
                        <x-input-label for="district" :value="__('Quận/huyện')" />
                        <select id="district" name="district"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Select District</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('district')" />
                    </div>

                    <div class="col-3 my-2">
                        <x-input-label for="province" :value="__('Tỉnh/Thành Phố')" />
                        <select id="province" name="province"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Select Province</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->code }}"
                                    {{ $province->code == $provinceId ? 'selected' : '' }}>
                                    {{ $province->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('province')" />
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 col-3 my-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                @endif
            </div>

        </div>

    </form>

    {{-- tính tuổi khi chọn birthday --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Khởi tạo Flatpickr
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('.flatpickr', {
                dateFormat: 'Y-m-d',
                maxDate: 'today',
                onChange: function(selectedDates, dateStr, instance) {
                    calculateAge();
                }
            });
        });

        // Hàm tính toán tuổi
        function calculateAge() {
            var birthday = $('#birthday').val();
            var ageField = $('#age');

            if (birthday) {
                var birthDate = new Date(birthday);
                var today = new Date();
                var age = today.getFullYear() - birthDate.getFullYear();
                var monthDifference = today.getMonth() - birthDate.getMonth();
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                ageField.val(age);
            }
        }

        // của phần địa chỉ
        const currentAddressSection = document.getElementById('currentAddressSection');

        const editAddressSection = document.getElementById('editAddressSection');

        function showEditForm() {
            // Ẩn phần địa chỉ hiện tại
            currentAddressSection.style.display = 'none';
            // Hiển thị phần form chỉnh sửa địa chỉ
            editAddressSection.style.display = 'block';
        }
        document.addEventListener('DOMContentLoaded', function() {
            const userAddress = '{{ $user->address ?? '' }}';

            // Kiểm tra giá trị của địa chỉ người dùng
            if (userAddress) {
                // Ẩn phần địa chỉ hiện tại
                currentAddressSection.style.display = 'block';

                // Hiển thị phần form chỉnh sửa địa chỉ
                editAddressSection.style.display = 'none';

            } else {
                // Ẩn phần địa chỉ hiện tại
                currentAddressSection.style.display = 'none';

                // Hiển thị phần form chỉnh sửa địa chỉ
                editAddressSection.style.display = 'block';
            }

            // Gọi hàm showEditForm() khi cần thiết
            // Ví dụ: bạn có thể gắn nó vào một sự kiện onclick của một nút
            // document.getElementById('editButton').addEventListener('click', showEditForm);
        });

        const provinceId = @json($provinceId);
        const districtId = @json($districtId);
        const wardId = @json($wardId);
        const apiUrls = {
            districts: '/api/districts/',
            wards: '/api/wards/'
        };

        $(document).ready(function() {
            const selects = {
                province: $('#province'),
                district: $('#district'),
                ward: $('#ward')
            };
            const defaultOption = '<option value="">Select</option>';
            const apiUrls = {
                districts: '/api/districts/',
                wards: '/api/wards/'
            };

            // Function to fetch data from API
            const fetchData = async (url) => {
                const response = await fetch(url);
                if (!response.ok) throw new Error('Network response was not ok.');
                return response.json();
            };

            // Function to populate select element
            const populateSelect = (select, data, selectedId) => {
                select.empty().append(defaultOption).prop('disabled', data.length === 0);
                data.forEach(item => select.append(
                    `<option value="${item.code}" ${item.code == selectedId ? 'selected' : ''}>${item.name}</option>`
                ));
            };

            // Function to handle select change
            const handleChange = async (select, apiUrl, targetSelect, targetSelectedId) => {
                const id = select.val();
                if (id) {
                    const data = await fetchData(apiUrl + id);
                    populateSelect(targetSelect, data, targetSelectedId);
                } else {
                    targetSelect.empty().append(defaultOption).prop('disabled', true);
                }
            };

            // Event listeners for select changes
            selects.province.on('change', () => handleChange(selects.province, apiUrls.districts, selects.district,
                districtId));
            selects.district.on('change', () => handleChange(selects.district, apiUrls.wards, selects.ward,
                wardId));

            // Initialize selects with default values
            (async function() {
                try {
                    const provinceId = '{{ $provinceId }}';
                    const districtId = '{{ $districtId }}';
                    const wardId = '{{ $wardId }}';

                    if (provinceId) {
                        const districts = await fetchData(apiUrls.districts + provinceId);
                        populateSelect(selects.district, districts, districtId);
                    }

                    if (districtId) {
                        const wards = await fetchData(apiUrls.wards + districtId);
                        populateSelect(selects.ward, wards, wardId);
                    }
                } catch (error) {
                    console.error('Error initializing selects:', error);
                }
            })();
        });
    </script>


</section>
