import HomeLayout from "@/components/layout/HomeLayout";
import Brand from "@/components/section/home/Brand";
import Cover from "@/components/section/home/Cover";

export default function Home() {
  return (
    <HomeLayout>
      <Cover />
      <Brand />
    </HomeLayout>
  );
}
