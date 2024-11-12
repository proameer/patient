<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralSpecialization;
use App\Models\SpecificSpecialization;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generalSpecializations = [
            'أمراض القلب' => [
                'أمراض القلب التدخلية',
                'طب قلب الأطفال',
                'أمراض كهربية القلب',
                'إدارة فشل القلب',
            ],
            'الأعصاب' => [
                'أعصاب السكتة الدماغية',
                'أعصاب الأطفال',
                'تخصص الصرع',
                'طب العضلات والأعصاب',
            ],
            'الأورام' => [
                'الأورام الطبية',
                'الأورام الإشعاعية',
                'الأورام الجراحية',
                'أورام الأطفال',
            ],
            'جراحة العظام' => [
                'جراحة العمود الفقري',
                'طب الإصابات الرياضية',
                'عظام الأطفال',
                'استبدال المفاصل',
            ],
            'طب الأطفال' => [
                'حديثي الولادة',
                'طب قلب الأطفال',
                'طب أعصاب الأطفال',
                'أورام الأطفال',
            ],
            'أمراض النساء' => [
                'طب الأم والجنين',
                'الغدد الصماء الإنجابية',
                'أورام النساء',
                'الجراحة النسائية الدقيقة',
            ],
            'الأمراض الجلدية' => [
                'جلدية الأطفال',
                'الأمراض الجلدية التجميلية',
                'تشخيص الأمراض الجلدية',
                'جراحة موس',
            ],
            'الأشعة' => [
                'الأشعة التداخلية',
                'أشعة الأطفال',
                'الأشعة العضلية الهيكلية',
                'الأشعة العصبية',
            ],
            'الطب النفسي' => [
                'طب نفس الأطفال والمراهقين',
                'طب النفس الشيخوخي',
                'طب النفس الإدماني',
                'الطب النفسي الشرعي',
            ],
            'أمراض الجهاز الهضمي' => [
                'أمراض الكبد',
                'طب جهاز الهضم للأطفال',
                'التنظير المتقدم',
                'تخصص أمراض الأمعاء الالتهابية',
            ],
        ];

        foreach ($generalSpecializations as $generalName => $specificSpecializations) {
            $general = GeneralSpecialization::create(['name' => $generalName]);

            foreach ($specificSpecializations as $specificName) {
                SpecificSpecialization::create([
                    'name' => $specificName,
                    'general_specialization_id' => $general->id,
                ]);
            }
        }
    }
}

