#include<cstdio>                                                                
#include<cstdlib>
#include<iostream>
#include<queue>
#include<cmath>
#include<string>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
#include<vector>
#include<cstring>
#include<algorithm>
using namespace std;
#define pi acos(-1.0)
#define inf 0x3f3f3f3f
char ch[110][110];
int main(void) {
	int n;

	while (scanf("%d", &n) != EOF) {
		char c = 'a';
		for (int i = 0; i < 2 * n + 1; i++) {
			if (i % 2 == 0) {
				for (int z = 0; z < 2 * n + 1; z++) {
					ch[i][z] = c;
					c++;
					if (c > 'z') c = 'a';
				}
			}
			else {
				for (int z = 2 * n; z >= 0; z--) {
					ch[i][z] = c;
					c++;
					if (c > 'z') c = 'a';
				}
			}
		}
		for (int i = 0; i < 2 * n + 1; i++) {
			for (int z = 0; z < 2 * n + 1; z++) {
				printf("%c", ch[i][z]);
			}
			printf("\n");
		}
	}
}