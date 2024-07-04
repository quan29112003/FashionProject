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

        {{-- user name --}}
        <div class="row">
            <div class="col-6 my-2">
                <x-input-label for="name_user" :value="__('Name')" />
                <x-text-input id="name_user" name="name_user" type="text" class="mt-1 block w-full" :value="old('name_user', $user->name_user)"
                    required autofocus autocomplete="name_user" />
                <x-input-error class="mt-2" :messages="$errors->get('name_user')" />
            </div>

            {{-- birthday --}}
            <div class="col-3 my-2">
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" name="birthday" type="text" class="mt-1 block w-full flatpickr"
                    :value="old('birthday', optional($user->birthday)->format('Y-m-d'))" autocomplete="birthday" />
                <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
            </div>

            {{-- age --}}
            <div class="col-3 my-2">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)"
                    autocomplete="age" readonly />
                <x-input-error class="mt-2" :messages="$errors->get('age')" />
            </div>

            {{-- email --}}
            <div class="col-6 my-2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                    required autocomplete="username" />
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

            <div class="col-12">
                <div class="row">
                    <div class="col-12 my-2" id="currentAddressSection" onclick="showEditForm()">
                        <x-input-label for="address" :value="__('address')" />
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
                        <x-input-label for="specific_address" :value="__('specific_address')" />
                        <x-text-input id="specific_address" name="specific_address" type="text"
                            class="mt-1 block w-full" :value="$specific_addressName" required autofocus
                            autocomplete="specific_address" />
                        <x-input-error class="mt-2" :messages="$errors->get('specific_address')" />
                    </div>

                    <div class="col-3 my-2">
                        <x-input-label for="ward" :value="__('Ward')" />
                        <select id="ward" name="ward"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Select Ward</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('ward')" />
                    </div>

                    <div class="col-3 my-2">
                        <x-input-label for="district" :value="__('District')" />
                        <select id="district" name="district"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            <option value="">Select District</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('district')" />
                    </div>

                    <div class="col-3 my-2">
                        <x-input-label for="province" :value="__('Province')" />
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

    <script>
        // Khởi tạo Flatpickr
        flatpickr('.flatpickr', {
            dateFormat: 'Y-m-d',
            maxDate: 'today',
            onChange: function(selectedDates, dateStr, instance) {
                calculateAge();
            }
        });

        // Hàm tính toán tuổi
        function calculateAge() {
            var birthday = document.getElementById('birthday').value;
            var ageField = document.getElementById('age');

            if (birthday) {
                var birthDate = new Date(birthday);
                var today = new Date();
                var age = today.getFullYear() - birthDate.getFullYear();
                var monthDifference = today.getMonth() - birthDate.getMonth();
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                ageField.value = age;
            }
        }
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
            document.getElementById('editButton').addEventListener('click', showEditForm);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const provinceSelect = document.getElementById('province');
            const districtSelect = document.getElementById('district');
            const wardSelect = document.getElementById('ward');

            provinceSelect.addEventListener('change', function() {
                fetchDistricts(this.value);
            });

            // Gán giá trị mặc định cho provinceSelect từ Laravel
            provinceSelect.value = '{{ $provinceId }}';

            // Gọi hàm fetchDistricts ban đầu khi đã có giá trị mặc định
            fetchDistricts('{{ $provinceId }}');

            // Hàm xử lý để fetch districts và cập nhật select box district
            function fetchDistricts(provinceId) {
                if (provinceId) {
                    const districtId = '{{ $districtId }}';

                    fetch(`/api/districts/${provinceId}`)
                        .then(response => response.json())
                        .then(data => {
                            districtSelect.innerHTML = '<option value="">Select District</option>';
                            data.forEach(district => {
                                districtSelect.innerHTML +=
                                    `<option value="${district.code}" ${district.code == districtId ? 'selected' : ''}>${district.name}</option>`;
                            });
                            districtSelect.disabled = false;
                            wardSelect.innerHTML = '<option value="">Select Ward</option>';
                            wardSelect.disabled = true;
                        });
                } else {
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                    districtSelect.disabled = true;
                    wardSelect.innerHTML = '<option value="">Select Ward</option>';
                    wardSelect.disabled = true;
                }
            }

            districtSelect.addEventListener('change', function() {
                fetchWards(this.value);
            });

            districtSelect.value = '{{ $districtId }}';

            fetchWards('{{ $districtId }}');

            function fetchWards(districtId) {
                if (districtId) {
                    const wardId = '{{ $wardId }}';
                    fetch(`/api/wards/${districtId}`)
                        .then(response => response.json())
                        .then(data => {
                            wardSelect.innerHTML = '<option value="">Select Ward</option>';
                            data.forEach(ward => {
                                wardSelect.innerHTML +=
                                    `<option value="${ward.code}" ${ward.code == wardId ? 'selected' : ''}>${ward.name}</option>`;
                            });
                            wardSelect.disabled = false;
                        });
                } else {
                    wardSelect.innerHTML = '<option value="">Select Ward</option>';
                    wardSelect.disabled = true;
                }
            }
        });
    </script>

</section>
