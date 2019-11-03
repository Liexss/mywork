#include<cstdio>
#include<map>
#include<algorithm>
#include<set>
#include<cstring>
#include<cstdlib>
#include<vector>
#include<cmath>
#include<stack>
#include<queue>
using namespace std;
typedef long long LL;
const int maxv=1e5+5;

int n,m,k,in[maxv];
map<pair<int,int>,int>mp;
vector<int>v[maxv],ans;
int x[maxv],y[maxv],cnt,co,inn[maxv];

void tp()
{
    priority_queue<int>pq;
    for(int i=1;i<=n;i++)
    {
        if(in[i]==0)
        {
            pq.push(i);
        }
    }
    while(!pq.empty())
    {
        if(cnt>=k)
        {
            break;
        }
        int now=pq.top();
        pq.pop();
        ans.push_back(now);
        if(ans.size()>1)
        {
            int lst=ans[ans.size()-2];
            int id=ans[ans.size()-1];
            if(mp.find(make_pair(lst,id))==mp.end())
            {
                cnt++;
                x[cnt]=lst;
                y[cnt]=id;
                in[id]++;
                inn[id]++;
                v[lst].push_back(id);
                //ans.pop_back();
            }
        }
        for(int i=0;i<v[now].size();i++)
        {
            int to=v[now][i];
            in[to]--;
            if(in[to]==0)
            {
                pq.push(to);
            }
        }
    }
}

void tpp()
{
    ans.clear();
            priority_queue<int,vector<int>,greater<int> >pp;
            for(int i=1;i<=n;i++)
            {
                if(inn[i]==0)
                {
                    pp.push(i);
                }
            }
            while(!pp.empty())
            {
                int idd=pp.top();
                pp.pop();
                ans.push_back(idd);
                for(int i=0;i<v[idd].size();i++)
                {
                    int to=v[idd][i];
                    inn[to]--;
                    if(inn[to]==0)
                    {
                        pp.push(to);
                    }
                }
            }
}

int main (void)
{
    freopen("graph.in","r",stdin);
    freopen("graph.out","w",stdout);
    scanf("%d %d %d",&n,&m,&k);
    cnt=0;
    co=0;
    for(int i=1;i<=m;i++)
    {
        int a,b;
        scanf("%d %d",&a,&b);
        if(mp.find(make_pair(a,b))==mp.end())
        {
            mp[make_pair(a,b)]=1;
            v[a].push_back(b);
            in[b]++;
            inn[b]++;
        }
    }
    tp();
    tpp();
    for(int i=0;i<ans.size();i++)
    {
        printf("%d",ans[i]);
        if(i!=ans.size()-1)
            printf(" ");
    }
    puts("");
    printf("%d\n",cnt);
    for(int i=1;i<=cnt;i++)
    {
        printf("%d %d\n",x[i],y[i]);
    }
    return 0;
}
